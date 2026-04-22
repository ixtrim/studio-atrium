<?php
namespace StudioAtrium\Entity\RenderAuthorize;

use StudioAtrium\Entity\EntityCollection;
use StudioAtrium\Entity\RenderAuthorize;

class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo = null)
    {
        $this->pdo = $pdo;
    }

    public function configure(array $config)
    {
        if (isset($config['pdo_handle'])) {
            $this->pdo = $config['pdo_handle'];
        }
    }

    public function getByProjectId($projectId, $status = null)
    {
        if (!$this->pdo) {
            return null;
        }

        $sql = 'SELECT * FROM render_authorize WHERE project_id = :project_id';
        $params = [':project_id' => (int)$projectId];

        if ($status !== null) {
            $sql .= ' AND status = :status';
            $params[':status'] = $status;
        }
        $sql .= ' ORDER BY id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        if (!$rows) {
            return null;
        }

        $items = [];
        foreach ($rows as $row) {
            $item = new RenderAuthorize();
            $item->setId((int)$row['id']);
            $item->setProjectId((int)$row['project_id']);
            $item->setRenderId((int)$row['render_id']);
            $item->setAuthorization($row['authorization'] ?? null);
            $item->setProps($row['props'] ?? null);
            $item->setStatus($row['status'] ?? RenderAuthorize::STATUS_DRAFT);
            $items[] = $item;
        }

        return new EntityCollection($items);
    }
}
