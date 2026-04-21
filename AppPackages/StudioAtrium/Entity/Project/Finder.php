<?php
namespace StudioAtrium\Entity\Project;

use StudioAtrium\Entity\Project;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
    public function __construct(private \PDO $pdo, private ?string $clicksearchSets = null) {}

    public function getById(int $id): ?Project
    {
        $stmt = $this->pdo->prepare('SELECT * FROM project WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    public function getListById(array $ids, string $status = Project::STATUS_PUBLISHED): EntityCollection
    {
        if (!$ids) return new EntityCollection();

        $ids = array_map('intval', $ids);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare(
            "SELECT * FROM project WHERE id IN ($placeholders) AND status = ? ORDER BY FIELD(id, $placeholders)"
        );
        $stmt->execute(array_merge($ids, [$status], $ids));
        $rows = $stmt->fetchAll();
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
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
