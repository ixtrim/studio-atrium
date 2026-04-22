<?php
namespace StudioAtrium\Entity\SketchAuthorize;

use StudioAtrium\Entity\EntityCollection;
use StudioAtrium\Entity\SketchAuthorize;

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

    public function getByProjectId($projectId, $sketchId = null, $publishedOnly = true, $withRooms = true)
    {
        if (!$this->pdo) {
            return null;
        }

        $projectIds = is_array($projectId) ? array_map('intval', $projectId) : [(int)$projectId];
        if (!$projectIds) {
            return null;
        }

        $placeholders = implode(',', array_fill(0, count($projectIds), '?'));
        $sql = "SELECT * FROM sketch_authorize WHERE project_id IN ($placeholders)";
        $params = $projectIds;

        if ($sketchId !== null && $sketchId !== false && $sketchId !== '') {
            $sql .= ' AND sketch_id = ?';
            $params[] = (int)$sketchId;
        }
        if ($publishedOnly) {
            $sql .= " AND status = 'published'";
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
            $items[] = $this->hydrate($row, $withRooms);
        }

        return new EntityCollection($items);
    }

    private function hydrate(array $row, $withRooms)
    {
        $item = new SketchAuthorize();
        $item->setId((int)$row['id']);
        $item->setProjectId((int)$row['project_id']);
        $item->setSketchId((int)$row['sketch_id']);
        $item->setWidth((int)($row['width'] ?? 0));
        $item->setHeight((int)($row['height'] ?? 0));
        $item->setProps($row['props'] ?? null);
        $item->setStatus($row['status'] ?? SketchAuthorize::STATUS_DRAFT);

        if ($withRooms) {
            $item->setRooms($this->loadRooms((int)$row['id']));
        }

        return $item;
    }

    private function loadRooms($sketchAuthorizeId)
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM sketch_authorize_rooms WHERE sketch_authorize_id = :id ORDER BY id ASC'
        );
        $stmt->execute([':id' => $sketchAuthorizeId]);
        $rows = $stmt->fetchAll();

        $rooms = [];
        foreach ($rows as $row) {
            $room = new Rooms();
            $room->setId((int)$row['id']);
            $room->setSketchAuthorizeId((int)$row['sketch_authorize_id']);
            $room->setSketchParamId((int)($row['sketch_param_id'] ?? 0));
            $room->setProjectToSketchParamId((int)($row['project_to_sketch_param_id'] ?? 0));
            $room->setDescription($row['description'] ?? '');
            $room->setLink($row['link'] ?? '');
            $room->setPoints($row['points'] ?? '');
            $room->setProps($row['props'] ?? null);
            $rooms[] = $room;
        }

        return $rooms;
    }
}
