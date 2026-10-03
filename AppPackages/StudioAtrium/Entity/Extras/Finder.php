<?php
namespace StudioAtrium\Entity\Extras;

use StudioAtrium\Entity\EntityCollection;

/**
 * `StudioAtrium\Entity\Extras\Finder` — PDO-backed extras + extras_listing lookup.
 * Matches Document\Finder pattern (legacy DAO classes were never ported).
 */
class Finder
{
    /** Free “in price” package extras shown in project detail “Dodatki w cenie”. */
    public const INCLUDED_VACUUM_ID = 19;
    public const INCLUDED_PHOTOVOLTAIC_ID = 22;

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Generic "dodatki" showcase page (Varia::doAddons / /dodatki/).
     */
    public function getExtrasList(bool $generalOnly = true, bool $withAttachments = true): EntityCollection
    {
        $sql = 'SELECT id, name, description, price, show_in_general, is_group, project_list_id FROM extras';
        if ($generalOnly) {
            $sql .= ' WHERE show_in_general = 1 AND is_group = 0';
        }
        $sql .= ' ORDER BY id ASC';

        $stmt = $this->pdo->query($sql);
        $items = [];
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $items[] = $this->mapExtrasRow($row);
        }

        return new EntityCollection($items);
    }

    /**
     * @return ExtrasRecord|null
     */
    public function getExtrasById($id)
    {
        $id = (int) $id;
        if ($id <= 0) {
            return null;
        }
        $stmt = $this->pdo->prepare(
            'SELECT id, name, description, price, show_in_general, is_group, project_list_id
             FROM extras WHERE id = :id LIMIT 1'
        );
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return new ExtrasRecord($this->mapExtrasRow($row));
    }

    /**
     * Project / admin extras listings.
     *
     * Matching rules for a project id:
     * - empty `projects` → applies to all projects, minus `projects_excluded`
     * - non-empty `projects` → only listed project ids
     *
     * @param string|null $type    package|normal (null = any)
     * @param string|null $status  enabled|disabled (null = any)
     * @param bool        $withExtras nest extras / project payloads
     * @param int|null    $projectId filter listings for one house project
     */
    public function getListings($type, $status, bool $withExtras = true, $projectId = null): EntityCollection
    {
        $sql = 'SELECT id, extras_id, package_price, project_id, projects, sorting, status, type, projects_excluded
                FROM extras_listing WHERE 1=1';
        $params = [];

        if ($type !== null && $type !== '') {
            $sql .= ' AND type = :type';
            $params['type'] = (string) $type;
        }
        if ($status !== null && $status !== '') {
            $sql .= ' AND status = :status';
            $params['status'] = (string) $status;
        }
        $sql .= ' ORDER BY sorting DESC, id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $projectId = ($projectId !== null && $projectId !== '') ? (int) $projectId : null;
        $items = [];
        $extrasCache = [];

        foreach ($rows as $row) {
            $listing = [
                'id'                => (int) $row['id'],
                'extras_id'         => (int) $row['extras_id'],
                'package_price'     => $row['package_price'] === null ? -1.0 : (float) $row['package_price'],
                'project_id'        => (int) $row['project_id'],
                'projects'          => (string) ($row['projects'] ?? ''),
                'sorting'           => (int) $row['sorting'],
                'status'            => (string) $row['status'],
                'type'              => (string) $row['type'],
                'projects_excluded' => (string) ($row['projects_excluded'] ?? ''),
            ];

            if ($projectId !== null && !$this->listingAppliesToProject($listing, $projectId)) {
                continue;
            }

            if ($withExtras) {
                if ($listing['extras_id'] > 0) {
                    $eid = $listing['extras_id'];
                    if (!array_key_exists($eid, $extrasCache)) {
                        $extra = $this->getExtrasById($eid);
                        $extrasCache[$eid] = $extra ? $extra->toArray() : null;
                    }
                    if ($extrasCache[$eid] === null) {
                        continue;
                    }
                    $listing['extras'] = $extrasCache[$eid];
                } else {
                    $listing['extras'] = null;
                }
                $listing['project'] = null;
            }

            $items[] = $listing;
        }

        return new EntityCollection($items);
    }

    /**
     * Free package extras for the “Dodatki w cenie” block (odkurzacz / fotowoltaika).
     *
     * @return list<array{id:int,name:string,label:string,url:string}>
     */
    public function getIncludedInPriceForProject(int $projectId): array
    {
        if ($projectId <= 0) {
            return [];
        }

        $wanted = [self::INCLUDED_VACUUM_ID, self::INCLUDED_PHOTOVOLTAIC_ID];
        $urls = [
            self::INCLUDED_VACUUM_ID => '/artykuly/Schematy-centralnego-odkurzacza-w-projektach-domow-studia-atrium,1439.html',
            self::INCLUDED_PHOTOVOLTAIC_ID => '/artykuly/Projekty-instalacji-fotowoltaicznej-w-projektach-domow-studia-atrium,1449.html',
        ];

        $listings = $this->getListings(
            Listing::TYPE_PACKAGE,
            Listing::STATUS_ENABLED,
            true,
            $projectId
        );

        $out = [];
        $seen = [];
        foreach ($listings as $listing) {
            $eid = (int) ($listing['extras_id'] ?? 0);
            $price = (float) ($listing['package_price'] ?? -1);
            if ($price !== 0.0 || !in_array($eid, $wanted, true) || isset($seen[$eid])) {
                continue;
            }
            $name = (string) ($listing['extras']['name'] ?? '');
            if ($name === '') {
                continue;
            }
            $seen[$eid] = true;
            $out[] = [
                'id'    => $eid,
                'name'  => $name,
                'label' => mb_strtolower($name, 'UTF-8'),
                'url'   => $urls[$eid] ?? '',
            ];
        }

        // Stable order: vacuum then photovoltaic
        usort($out, static function ($a, $b) use ($wanted) {
            return array_search($a['id'], $wanted, true) <=> array_search($b['id'], $wanted, true);
        });

        return $out;
    }

    private function listingAppliesToProject(array $listing, int $projectId): bool
    {
        $projects = trim((string) ($listing['projects'] ?? ''));
        $excluded = trim((string) ($listing['projects_excluded'] ?? ''));

        if ($projects === '' || strcasecmp($projects, 'project_type') === 0) {
            if ($excluded === '') {
                return true;
            }
            return !in_array($projectId, $this->parseIdList($excluded), true);
        }

        return in_array($projectId, $this->parseIdList($projects), true);
    }

    /**
     * @return list<int>
     */
    private function parseIdList(string $csv): array
    {
        $ids = [];
        foreach (preg_split('/\s*,\s*/', $csv) as $part) {
            $part = trim($part);
            if ($part === '' || !ctype_digit($part)) {
                continue;
            }
            $ids[] = (int) $part;
        }
        return $ids;
    }

    private function mapExtrasRow(array $row): array
    {
        return [
            'id'              => (int) $row['id'],
            'name'            => (string) $row['name'],
            'description'     => (string) ($row['description'] ?? ''),
            'price'           => isset($row['price']) ? (float) $row['price'] : 0.0,
            'show_in_general' => (int) ($row['show_in_general'] ?? 0),
            'is_group'        => (int) ($row['is_group'] ?? 0),
            'project_list_id' => (string) ($row['project_list_id'] ?? ''),
            'attachments'     => ['ExtrasImage' => []],
        ];
    }
}

/**
 * Lightweight extras row for Order / cart (getName / toArray).
 */
class ExtrasRecord
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getId(): int
    {
        return (int) ($this->data['id'] ?? 0);
    }

    public function getName(): string
    {
        return (string) ($this->data['name'] ?? '');
    }

    public function getDescription(): string
    {
        return (string) ($this->data['description'] ?? '');
    }

    public function getPrice(): float
    {
        return (float) ($this->data['price'] ?? 0);
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
