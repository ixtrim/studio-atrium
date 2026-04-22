<?php
namespace StudioAtrium\Entity\HouseSituation;

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

    public function getByProjectId($projectId, $storey = 0, $activeOnly = true, $withRooms = false)
    {
        $sql = 'SELECT * FROM house_situation WHERE project_id = :project_id AND storey = :storey';
        if ($activeOnly) {
            $sql .= " AND status = 'active'";
        }
        $sql .= ' ORDER BY id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ':project_id' => (int) $projectId,
            ':storey' => (int) $storey,
        ));
        $rows = $stmt->fetchAll();

        $items = array();
        foreach ($rows as $row) {
            $items[] = $this->hydrate($row, $withRooms);
        }

        return new EntityCollection($items);
    }

    private function hydrate(array $row, $withRooms)
    {
        return array(
            'id'            => (int) $row['id'],
            'project_id'    => (int) $row['project_id'],
            'storey'        => isset($row['storey']) ? (int) $row['storey'] : 0,
            'corner_points' => isset($row['corner_points']) ? $row['corner_points'] : '{}',
            'wall_n'        => isset($row['wall_n']) ? $row['wall_n'] : 'light',
            'wall_e'        => isset($row['wall_e']) ? $row['wall_e'] : 'light',
            'wall_s'        => isset($row['wall_s']) ? $row['wall_s'] : 'light',
            'wall_w'        => isset($row['wall_w']) ? $row['wall_w'] : 'light',
            'status'        => isset($row['status']) ? $row['status'] : 'active',
        );
    }
}
