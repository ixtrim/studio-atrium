<?php
namespace StudioAtrium\Entity\ShowroomProduct;

use StudioAtrium\Entity\EntityCollection;

/**
 * `StudioAtrium\Entity\ShowroomProduct\Finder` was never ported during the rewrite.
 * Project::doHouse / doGetShowroom call getListById() when a project has
 * render-authorize (showroom hotspots); without this class the product page
 * fatals. Built on raw PDO — the DAO class
 * StudioAtrium\Entity\ShowroomProduct\DAO\PDOMySQL was never written either.
 *
 * Attachment owner_uid = productId * 256 + ATTACHMENT_SLOT (slot 60 confirmed
 * from live ShowroomImage rows, e.g. product 5 → owner_uid 1340).
 */
class Finder
{
    const ATTACHMENT_SLOT = 60;

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array|int $ids
     */
    public function getListById($ids): EntityCollection
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }
        $ids = array_values(array_unique(array_filter(array_map('intval', $ids))));
        if (!$ids) {
            return new EntityCollection([]);
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare(
            "SELECT id, name, category, short_descript, descript, producer, link, renders, status
             FROM showroom_product
             WHERE id IN ($placeholders)"
        );
        $stmt->execute($ids);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $byId = [];
        $slotMap = []; // owner_uid => product id
        foreach ($rows as $row) {
            $id = (int)$row['id'];
            $byId[$id] = [
                'id'            => $id,
                'name'          => $row['name'],
                'category'      => $row['category'],
                'short_descript'=> $row['short_descript'],
                'descript'      => $row['descript'],
                'producer'      => $row['producer'],
                'link'          => $row['link'],
                'renders'       => $row['renders'],
                'status'        => $row['status'],
                'attachments'   => ['ShowroomImage' => []],
            ];
            $slotMap[$id * 256 + self::ATTACHMENT_SLOT] = $id;
        }

        if ($slotMap) {
            $this->_attachShowroomImages($byId, $slotMap);
        }

        // Preserve requested id order when present
        $ordered = [];
        foreach ($ids as $id) {
            if (isset($byId[$id])) {
                $ordered[] = $byId[$id];
            }
        }

        return new EntityCollection($ordered);
    }

    /**
     * Nest ShowroomImage + thumb children under each product's attachments.
     * Template reads: attachments.ShowroomImage[0].childAttachments.thumb[0]
     */
    private function _attachShowroomImages(array &$byId, array $slotMap)
    {
        $slots = array_keys($slotMap);
        $placeholders = implode(',', array_fill(0, count($slots), '?'));
        $stmt = $this->pdo->prepare(
            "SELECT id, owner_uid, filename, path, profile_name, title, description,
                    props, sorting, parent_attachment_id, parent_relationship
             FROM attachment
             WHERE owner_uid IN ($placeholders)
               AND profile_name = 'ShowroomImage'
             ORDER BY sorting ASC, id ASC"
        );
        $stmt->execute($slots);
        $attRows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $parents = [];  // attachment id => att array
        $children = []; // parent_attachment_id => [att, ...]
        foreach ($attRows as $ar) {
            $att = [
                'id'                   => (int)$ar['id'],
                'owner_uid'            => (string)$ar['owner_uid'],
                'filename'             => $ar['filename'] ?? '',
                'path'                 => $ar['path'] ?? '',
                'profile_name'         => $ar['profile_name'] ?? '',
                'title'                => $ar['title'] ?? null,
                'description'          => $ar['description'] ?? null,
                'props'                => $ar['props'] ?? null,
                'sorting'              => (int)($ar['sorting'] ?? 0),
                'parent_attachment_id' => (int)($ar['parent_attachment_id'] ?? 0),
                'parent_relationship'  => $ar['parent_relationship'] ?? null,
                'childAttachments'     => [],
            ];
            if ((int)$ar['parent_attachment_id'] > 0) {
                $children[(int)$ar['parent_attachment_id']][] = $att;
            } else {
                $parents[(int)$ar['id']] = $att;
            }
        }

        foreach ($children as $parentId => $kids) {
            if (!isset($parents[$parentId])) {
                continue;
            }
            foreach ($kids as $kid) {
                $rel = $kid['parent_relationship'] ?: 'list';
                $parents[$parentId]['childAttachments'][$rel][] = $kid;
            }
        }

        foreach ($parents as $att) {
            $productId = $slotMap[(int)$att['owner_uid']] ?? null;
            if ($productId === null || !isset($byId[$productId])) {
                continue;
            }
            $byId[$productId]['attachments']['ShowroomImage'][] = $att;
        }
    }
}
