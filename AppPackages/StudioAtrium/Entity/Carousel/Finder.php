<?php
namespace StudioAtrium\Entity\Carousel;

use StudioAtrium\Entity\EntityCollection;
use StudioAtrium\Entity\Carousel;

class Finder
{
    public function __construct(private \PDO $pdo) {}

    public function getList(bool $onlyEnabled = true): EntityCollection
    {
        $sql = "SELECT c.*, a.path, a.filename, a.props, a.profile_name
                FROM carousel c
                LEFT JOIN attachment a ON a.owner_uid = c.id * 256 + 28 AND a.profile_name IN ('CarouselBg', 'CarouselImage')
                WHERE 1=1";
        if ($onlyEnabled) {
            $sql .= " AND c.status = 'enabled'";
        }
        $sql .= ' ORDER BY c.sorting ASC, a.sorting ASC';

        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll();

        $carousels = [];
        foreach ($rows as $row) {
            $id = $row['id'];
            if (!isset($carousels[$id])) {
                $decoded = $row['extra_data'] ? json_decode($row['extra_data'], true) : null;
                $extraData = is_array($decoded) ? $decoded : [];
                $carousels[$id] = [
                    'id'          => (int)$row['id'],
                    'name'        => $row['name'],
                    'text1'       => $row['text1'],
                    'text2'       => $row['text2'],
                    'text3'       => $row['text3'],
                    'link'        => $row['link'],
                    'status'      => $row['status'],
                    'extra_data'  => $extraData,
                    'attachments' => ['CarouselBg' => [], 'CarouselImage' => []],
                ];
            }
            if ($row['filename'] && $row['profile_name']) {
                $props = $row['props'] ? (json_decode($row['props'], true) ?? []) : [];
                $carousels[$id]['attachments'][$row['profile_name']][] = [
                    'path'     => $row['path'] ?? '',
                    'filename' => $row['filename'],
                    'props'    => $props,
                ];
            }
        }

        return new EntityCollection(array_map(fn($d) => new Carousel($d), array_values($carousels)));
    }
}
