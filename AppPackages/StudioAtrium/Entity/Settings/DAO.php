<?php
namespace StudioAtrium\Entity\Settings;

use StudioAtrium\Entity\Settings;
use StudioAtrium\Entity\EntityCollection;

class DAO
{
        private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Find settings matching the given params.
     * Returns EntityCollection or false if nothing found.
     */
    public function find(\Point7_AbstractDAO_FinderParams $params)
    {
        $result = $params->buildWhere();
        $whereClause = $result['sql'] ?? '';
        $bindings    = $result['params'] ?? [];

        $sql = 'SELECT * FROM settings';
        if ($whereClause) {
            $sql .= ' ' . $whereClause;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bindings);
        $rows = $stmt->fetchAll();

        if (!$rows) return false;

        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    private function hydrate(array $row): Settings
    {
        $s = new Settings();
        $s->setId((int)$row['id']);
        $s->setName($row['name'] ?? '');
        $s->setCharId($row['char_id'] ?? '');
        $s->setValueType($row['value_type'] ?? 'string');
        $s->setNumValue(isset($row['num_value']) ? (float)$row['num_value'] : null);
        $s->setStringValue($row['string_value'] ?? null);
        $s->setFamily($row['family'] ?? null);
        return $s;
    }
}
