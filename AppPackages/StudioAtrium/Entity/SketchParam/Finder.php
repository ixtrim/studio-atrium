<?php
namespace StudioAtrium\Entity\SketchParam;

use StudioAtrium\Entity\EntityCollection;

class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function configure(array $config)
    {
    }

    public function getList()
    {
        $stmt = $this->pdo->query('SELECT * FROM sketch_param ORDER BY id ASC');
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = $this->hydrateDefinition($row);
        }

        return new EntityCollection($items);
    }

    public function getById($ids)
    {
        if (!is_array($ids)) {
            $ids = array($ids);
        }

        $ids = array_values(array_filter(array_map('intval', $ids)));
        if (!$ids) {
            return new EntityCollection();
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare("SELECT * FROM sketch_param WHERE id IN ($placeholders) ORDER BY id ASC");
        $stmt->execute($ids);
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = $this->hydrateDefinition($row);
        }

        return new EntityCollection($items);
    }

    public function getParamsForProject($projectId, $storey = null)
    {
        $sql = 'SELECT * FROM project_to_sketch_param WHERE project_id = :project_id';
        $params = array(':project_id' => (int) $projectId);

        if ($storey !== null && $storey !== '') {
            $sql .= ' AND storey = :storey';
            $params[':storey'] = $storey;
        }

        $sql .= ' ORDER BY sketch_id ASC, sorting ASC, id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = new ProjectLink($row);
        }

        return new EntityCollection($items);
    }

    private function hydrateDefinition(array $row)
    {
        return array(
            'id'              => (int) $row['id'],
            'name'            => isset($row['name']) ? $row['name'] : '',
            'clicksearch_name'=> isset($row['clicksearch_name']) ? $row['clicksearch_name'] : null,
            'type'            => isset($row['type']) ? $row['type'] : 'normal',
            'is_clicksearch'  => isset($row['is_clicksearch']) ? (int) $row['is_clicksearch'] : 0,
        );
    }
}
