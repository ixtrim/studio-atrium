<?php
namespace StudioAtrium\Entity\Box;

use StudioAtrium\Entity\Box;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
    public function __construct(private \PDO $pdo) {}

    public function getList(bool $onlyPublished = true, bool $withAttachments = false): EntityCollection
    {
        $sql = 'SELECT * FROM boxes';
        if ($onlyPublished) {
            $sql .= " WHERE status = 'published'";
        }
        $sql .= ' ORDER BY sorting ASC';

        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll();

        $boxes = [];
        $slotMap = []; // slot => box id
        foreach ($rows as $row) {
            $box = new Box();
            $box->setId((int)$row['id']);
            $box->setName($row['name'] ?? '');
            $box->setSubtitle($row['subtitle'] ?? null);
            $box->setLink($row['link'] ?? null);
            $box->setBgColor($row['bg_color'] ?: null);
            $box->setBgColorHover($row['bg_color_hover'] ?? null);
            $box->setDescription($row['description'] ?? null);
            $box->setSorting((int)($row['sorting'] ?? 0));
            $box->setStatus($row['status'] ?? 'published');
            $box->setType($row['type'] ?? 'link');
            $box->setProjectCategoryId(isset($row['project_category_id']) && $row['project_category_id'] ? (int)$row['project_category_id'] : null);
            $boxes[(int)$row['id']] = $box;
            $slotMap[(int)$row['id'] * 256 + 33] = (int)$row['id'];
        }

        if ($withAttachments && $boxes) {
            $slots = array_keys($slotMap);
            $placeholders = implode(',', array_fill(0, count($slots), '?'));
            $attStmt = $this->pdo->prepare(
                "SELECT * FROM attachment WHERE owner_uid IN ($placeholders) ORDER BY sorting ASC"
            );
            $attStmt->execute($slots);
            $attRows = $attStmt->fetchAll();

            // Group by owner_uid
            $attBySlot = [];
            foreach ($attRows as $attRow) {
                $attBySlot[(int)$attRow['owner_uid']][] = $attRow;
            }

            foreach ($slotMap as $slot => $boxId) {
                $attachmentObjects = [];
                foreach ($attBySlot[$slot] ?? [] as $ar) {
                    $a = new \Point7_CMS_Attachment();
                    $a->setId((int)$ar['id']);
                    $a->setOwnerUid((string)$ar['owner_uid']);
                    $a->setFilename($ar['filename'] ?? '');
                    $a->setPath($ar['path'] ?? '');
                    $a->setProfileName($ar['profile_name'] ?? '');
                    $a->setTitle($ar['title'] ?? null);
                    $a->setDescription($ar['description'] ?? null);
                    $a->setProps($ar['props'] ?? null);
                    $a->setSortOrder((int)($ar['sorting'] ?? 0));
                    $attachmentObjects[] = $a;
                }
                $boxes[$boxId]->setAttachmentObjects($attachmentObjects);
            }
        }

        return new EntityCollection(array_values($boxes));
    }
}
