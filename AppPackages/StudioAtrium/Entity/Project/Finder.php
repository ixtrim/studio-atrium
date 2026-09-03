<?php
namespace StudioAtrium\Entity\Project;

use StudioAtrium\Entity\Project;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
        private $pdo;
    private $clicksearchSets;
    private $lastClickSearchStats;

    public function __construct(\PDO $pdo, $clicksearchSets = null)
    {
        $this->pdo = $pdo;
        $this->clicksearchSets = $clicksearchSets;
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM project WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    /**
     * Load projects by id list, optionally paginated.
     * Signature matches production call sites:
     * getListById($ids, $status, $preserveOrder, $pageIndex, $limit, $sortBy, $sortOrder)
     *
     * @param array|int $ids
     * @param string|false|null $status  false/null/'' = any status
     * @param bool $preserveOrder        kept for call-site compatibility
     * @param int|null $page             0-based page index; null = no pagination
     * @param int|string|null $limit     page size; null/0 = return all
     * @param string $sortBy             id|name|usable_area
     * @param string $sortOrder          ASC|DESC
     */
    public function getListById(
        $ids,
        $status = Project::STATUS_PUBLISHED,
        $preserveOrder = true,
        $page = null,
        $limit = null,
        $sortBy = 'id',
        $sortOrder = 'ASC'
    ): EntityCollection {
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        $ids = array_values(array_filter(array_map('intval', $ids)));
        if (!$ids) {
            return new EntityCollection();
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $params = $ids;
        $statusSql = '';
        if ($status !== false && $status !== null && $status !== '') {
            $statusSql = ' AND status = ?';
            $params[] = $status;
        }

        $sortOrderSql = (strtoupper((string) $sortOrder) === 'DESC') ? 'DESC' : 'ASC';
        if ($sortBy === 'name') {
            $orderSql = " ORDER BY name $sortOrderSql, id $sortOrderSql";
        } else {
            // Category / click-search lists arrive pre-ordered; keep that order.
            $orderSql = " ORDER BY FIELD(id, $placeholders)";
            $params = array_merge($params, $ids);
        }

        $stmt = $this->pdo->prepare(
            "SELECT * FROM project WHERE id IN ($placeholders)$statusSql$orderSql"
        );
        $stmt->execute($params);
        $rows = $stmt->fetchAll();
        $total = count($rows);

        $limit = ($limit === null || $limit === '') ? null : (int) $limit;
        if ($limit !== null && $limit > 0) {
            $page = max(0, (int) $page);
            $rows = array_slice($rows, $page * $limit, $limit);
        }

        return new EntityCollection(array_map(array($this, 'hydrate'), $rows), $total);
    }

    public function getList(string $status = Project::STATUS_PUBLISHED, int $limit = 50, int $offset = 0): EntityCollection
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM project WHERE status = :status ORDER BY id DESC LIMIT :limit OFFSET :offset'
        );
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    /**
     * Runs the "click search" filter query. The actual DB query lives in
     * site-backend's ProjectSearch module (called over HTTP, server-to-server) —
     * see AppPackages/StudioAtrium/Application/Helper/ClickSearchMap.php for how
     * $searchParams/$csParams are keyed (project_param.id => value/range).
     * $arg4/$arg5 are accepted for call-site compatibility but currently unused.
     *
     * @return int[] matching project ids
     */
    public function clickSearch(array $searchParams, array $csParams, $categoryId = null, $arg4 = false, $arg5 = false, $sortByArea = false): array
    {
        $result = $this->_callClickSearchApi($searchParams, $csParams, $categoryId);
        $this->lastClickSearchStats = $result['stats'] ?? ['total' => 0, 'types' => [], 'sets' => []];
        return $result['projectIds'] ?? [];
    }

    /**
     * Per-facet result counts from the most recent clickSearch() call.
     * Must be called after clickSearch() — matches the calling convention
     * already used in Modules/Project.php's doClickSearchNumbers().
     */
    public function getClickSearchStats(): array
    {
        return $this->lastClickSearchStats ?? ['total' => 0, 'types' => [], 'sets' => []];
    }

    /**
     * Load rows from project_feature.
     * Call sites pass a truthy first arg (true / 'sorting') to sort by sorting DESC,
     * and optionally a list of feature ids from project.extra_data.
     *
     * @param mixed $orderBySorting
     * @param array|null $idList
     * @return EntityCollection array rows with id/name/description/sorting
     */
    public function getFeatures($orderBySorting = false, $idList = null): EntityCollection
    {
        if ($idList !== null && !is_array($idList)) {
            $idList = array($idList);
        }

        $sql = 'SELECT id, name, description, sorting FROM project_feature';
        $params = array();

        if (!empty($idList)) {
            $ids = array();
            foreach ($idList as $id) {
                $id = (int) $id;
                if ($id > 0) {
                    $ids[$id] = $id;
                }
            }
            if (empty($ids)) {
                return new EntityCollection();
            }
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $sql .= " WHERE id IN ($placeholders)";
            $params = array_values($ids);
        }

        if ($orderBySorting) {
            $sql .= ' ORDER BY sorting DESC, id ASC';
        } else {
            $sql .= ' ORDER BY name ASC, id ASC';
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (!$rows) {
            return new EntityCollection();
        }

        foreach ($rows as $i => $row) {
            $rows[$i]['id'] = (int) $row['id'];
            $rows[$i]['sorting'] = (int) $row['sorting'];
        }

        return new EntityCollection($rows);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getFeatureById($id)
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, name, description, sorting FROM project_feature WHERE id = :id LIMIT 1'
        );
        $stmt->execute(array(':id' => (int) $id));
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $row['id'] = (int) $row['id'];
        $row['sorting'] = (int) $row['sorting'];
        return $row;
    }

    private function _callClickSearchApi(array $searchParams, array $csParams, $categoryId): array
    {
        $url = \Point7_WebApp::getConfigParam('helpers.clicksearch_api');
        if (!$url) {
            return ['projectIds' => [], 'stats' => ['total' => 0, 'types' => [], 'sets' => []]];
        }

        $typProjektu = $csParams['_typ_projektu'] ?? null;
        unset($csParams['_typ_projektu']);

        $payload = json_encode([
            'searchParams' => $searchParams,
            'csParams'     => $csParams,
            'categoryId'   => $categoryId,
            'typProjektu'  => $typProjektu,
        ]);

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 3,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_TIMEOUT        => 8,
        ]);
        $body    = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr  = curl_error($ch);
        $ok       = $body !== false && $httpCode === 200;
        curl_close($ch);

        if (!$ok) {
            \Point7_WebApp::getLogger('error')->error(
                "clickSearch API call failed: url={$url} http_code={$httpCode} curl_error={$curlErr}"
            );
            return ['projectIds' => [], 'stats' => ['total' => 0, 'types' => [], 'sets' => []]];
        }

        $decoded = json_decode($body, true);
        if (!is_array($decoded) || ($decoded['status'] ?? null) !== 'ok') {
            return ['projectIds' => [], 'stats' => ['total' => 0, 'types' => [], 'sets' => []]];
        }

        return $decoded;
    }

    private function hydrate(array $row): Project
    {
        $p = new Project();
        $p->setId((int)$row['id']);
        $p->setIdOld(isset($row['id_old']) ? (int)$row['id_old'] : null);
        $p->setSymbolAlpha($row['symbol_alpha'] ?? '');
        $p->setSymbolNum((int)($row['symbol_num'] ?? 0));
        $p->setName($row['name'] ?? '');
        $p->setAlternateName($row['alternate_name'] ?? null);
        $p->setShortDescription($row['short_description'] ?? null);
        $p->setDescription($row['description'] ?? null);
        $p->setAlternateDescription($row['alternate_description'] ?? null);
        $p->setPrice($row['price'] ?? null);
        $p->setDiscount($row['discount'] ?? null);
        $p->setType($row['type'] ?? 'house');
        $p->setStatus($row['status'] ?? 'published');
        $p->setParamsGeneral($row['params_general'] ?? null);
        $p->setParamsList($row['params_list'] ?? null);
        $p->setBuildCost($row['build_cost'] ?? null);
        $p->setMetaTitle($row['meta_title'] ?? null);
        $p->setMetaDescription($row['meta_description'] ?? null);
        $p->setModifyDate($row['modify_date'] ?? null);
        $p->setTechnology($row['technology'] ?? null);
        $p->setExtraData($row['extra_data'] ?? null);
        return $p;
    }
}
