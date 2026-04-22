<?php
namespace StudioAtrium\Entity\Settings;

use StudioAtrium\Entity\Settings;
use StudioAtrium\Entity\EntityCollection;

/**
 * Site settings lookup (settings table, keyed by char_id).
 * Used by Project::doList (black_week_banner), promo settings, cost factors, etc.
 */
class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Legacy DAORepository passes dao_settings via configure(); PDO ctor is used instead.
     */
    public function configure(array $config)
    {
    }

    /**
     * @param string $charId
     * @return Settings|null
     */
    public function getByCharId($charId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM settings WHERE char_id = :char_id LIMIT 1');
        $stmt->execute(array(':char_id' => $charId));
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    /**
     * @param string|null $family
     * @return EntityCollection
     */
    public function getList($family = null)
    {
        $sql = 'SELECT * FROM settings';
        $params = array();
        if ($family !== null && $family !== '') {
            $sql .= ' WHERE family = :family';
            $params[':family'] = $family;
        }
        $sql .= ' ORDER BY name ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = $this->hydrate($row);
        }

        return new EntityCollection($items);
    }

    private function hydrate(array $row)
    {
        $s = new Settings();
        $s->setId((int)$row['id']);
        $s->setName(isset($row['name']) ? $row['name'] : '');
        $s->setCharId(isset($row['char_id']) ? $row['char_id'] : '');
        $s->setValueType(isset($row['value_type']) ? $row['value_type'] : 'string');
        $s->setNumValue(isset($row['num_value']) ? (float)$row['num_value'] : null);
        $s->setStringValue(isset($row['string_value']) ? $row['string_value'] : null);
        $s->setFamily(isset($row['family']) ? $row['family'] : null);
        return $s;
    }
}
