<?php
class Point7_CMS_Attachment_DAO_PDOMySQL
{
    private $pdo       = null;
    private $table     = 'attachment';
    private $setNames  = 'utf8';
    public function configure(string $key, $value)
    {
        switch ($key) {
            case 'pdo_handle':
                $this->pdo = $value;
                break;
            case 'table_name':
                $this->table = (string)$value;
                break;
            case 'set_names':
                $this->setNames = (string)$value;
                break;
        }
    }

    private function pdo(): PDO
    {
        if (!$this->pdo) {
            $this->pdo = Point7_WebApp::getPDO();
        }
        return $this->pdo;
    }

    public function getForObject(string $uid, $profile = null)
    {
        $sql    = "SELECT * FROM `{$this->table}` WHERE owner_uid = :uid";
        $params = [':uid' => $uid];
        if ($profile !== null) {
            $sql      .= ' AND profile_name = :profile';
            $params[':profile'] = $profile;
        }
        $sql .= ' ORDER BY sorting ASC';
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute($params);
        return $this->buildCollection($stmt->fetchAll());
    }

    public function getWithChildren(int $id)
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM `{$this->table}` WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        if (!$row) return null;

        $attachment = $this->hydrate($row);

        // Fetch children
        $stmt2 = $this->pdo()->prepare("SELECT * FROM `{$this->table}` WHERE parent_attachment_id = :pid ORDER BY sorting ASC");
        $stmt2->execute([':pid' => $id]);
        $children = [];
        foreach ($stmt2->fetchAll() as $childRow) {
            $relationship = $childRow['parent_relationship'] ?? '';
            if ($relationship === '') {
                $relationship = 'default';
            }
            if (!isset($children[$relationship])) {
                $children[$relationship] = [];
            }
            $children[$relationship][] = $this->hydrate($childRow);
        }
        $attachment->setChildAttachments($children);

        return $attachment;
    }

    public function store(Point7_CMS_Attachment $a)
    {
        if ($a->getId()) {
            $stmt = $this->pdo()->prepare(
                "UPDATE `{$this->table}` SET owner_uid=:uid, filename=:fn, path=:path,
                 profile_name=:profile, title=:title, description=:desc, props=:props,
                 sorting=:sort WHERE id=:id"
            );
            $stmt->execute([
                ':uid'     => $a->getOwnerUid(),
                ':fn'      => $a->getFilename(),
                ':path'    => $a->getPath(),
                ':profile' => $a->getProfileName(),
                ':title'   => $a->getTitle(),
                ':desc'    => $a->getDescription(),
                ':props'   => $a->getProps(),
                ':sort'    => $a->getSortOrder(),
                ':id'      => $a->getId(),
            ]);
        } else {
            $stmt = $this->pdo()->prepare(
                "INSERT INTO `{$this->table}` (owner_uid, filename, path, profile_name, title, description, props, sorting)
                 VALUES (:uid, :fn, :path, :profile, :title, :desc, :props, :sort)"
            );
            $stmt->execute([
                ':uid'     => $a->getOwnerUid(),
                ':fn'      => $a->getFilename(),
                ':path'    => $a->getPath(),
                ':profile' => $a->getProfileName(),
                ':title'   => $a->getTitle(),
                ':desc'    => $a->getDescription(),
                ':props'   => $a->getProps(),
                ':sort'    => $a->getSortOrder(),
            ]);
            $a->setId((int)$this->pdo()->lastInsertId());
        }
    }

    private function hydrate(array $row): Point7_CMS_Attachment
    {
        $a = new Point7_CMS_Attachment();
        $a->setId((int)($row['id'] ?? 0));
        $a->setOwnerUid((string)($row['owner_uid'] ?? ''));
        $a->setFilename((string)($row['filename'] ?? ''));
        $a->setPath((string)($row['path'] ?? ''));
        $a->setProfileName((string)($row['profile_name'] ?? ''));
        $a->setTitle($row['title'] ?? null);
        $a->setDescription($row['description'] ?? null);
        $a->setProps($row['props'] ?? null);
        $a->setSortOrder((int)($row['sorting'] ?? 0));
        if (!empty($row['parent_relationship'])) {
            $a->setParentRelationship($row['parent_relationship']);
        }
        return $a;
    }

    private function buildCollection(array $rows)
    {
        if (!$rows) {
            return new \StudioAtrium\Entity\Attachment\Collection();
        }

        $byId = [];
        foreach ($rows as $row) {
            $attachment = $this->hydrate($row);
            $byId[$attachment->getId()] = $attachment;
        }

        $topLevel = [];
        foreach ($rows as $row) {
            $id = (int)($row['id'] ?? 0);
            $parentId = (int)($row['parent_attachment_id'] ?? 0);

            if ($parentId > 0 && isset($byId[$parentId])) {
                $relationship = $row['parent_relationship'] ?? '';
                if ($relationship === '') {
                    $relationship = 'default';
                }

                $parent = $byId[$parentId];
                $children = $parent->getChildAttachments();
                if (!isset($children[$relationship])) {
                    $children[$relationship] = [];
                }
                $children[$relationship][] = $byId[$id];
                $parent->setChildAttachments($children);
            } else {
                $topLevel[] = $byId[$id];
            }
        }

        return new \StudioAtrium\Entity\Attachment\Collection($topLevel);
    }

    /**
     * Get attachments by profile, optionally joined with their project owner.
     * Uses slot formula: owner_uid = projectId * 256 + 2 for project attachments.
     *
     * @param string $profile  Profile name (e.g. 'ProjectRealisation')
     * @param bool $onlyPublished  Only include attachments whose project is published
     * @param int $limit
     * @param bool $withOwner  Include owner project data in result
     * @param bool $onlyMain  Prefer parent/main rows when possible
     * @param bool $asArray  (ignored — always returns array rows)
     * @param int $page 1-based page
     * @return array{rows:array,total:int}
     */
    public function getAttachmentsByProfile(
        $profile,
        $onlyPublished = true,
        $limit = 10,
        $withOwner = true,
        $onlyMain = false,
        $asArray = true,
        $page = 1
    ) {
        return $this->queryAttachmentsByProfile(
            (string) $profile,
            array(),
            (bool) $onlyPublished,
            (int) $limit,
            (bool) $withOwner,
            (bool) $onlyMain,
            max(1, (int) $page)
        );
    }

    /**
     * Same as getAttachmentsByProfile but restricted to owner_uid list.
     *
     * @param string $profile
     * @param array $uidList
     * @param bool $onlyPublished
     * @param int $limit
     * @param int $page
     * @return array{rows:array,total:int}
     */
    public function getAttachmentsByProfileAndUid(
        $profile,
        array $uidList,
        $onlyPublished = true,
        $limit = 10,
        $page = 1
    ) {
        $uids = array();
        foreach ($uidList as $uid) {
            $uid = (int) $uid;
            if ($uid > 0) {
                $uids[$uid] = $uid;
            }
        }
        if (!$uids) {
            return array('rows' => array(), 'total' => 0);
        }

        return $this->queryAttachmentsByProfile(
            (string) $profile,
            array_values($uids),
            (bool) $onlyPublished,
            (int) $limit,
            true,
            false,
            max(1, (int) $page)
        );
    }

    /**
     * @param string $profile
     * @param int[] $uidList empty = no uid filter
     * @param bool $onlyPublished
     * @param int $limit
     * @param bool $withOwner
     * @param bool $onlyMain
     * @param int $page
     * @return array{rows:array,total:int}
     */
    private function queryAttachmentsByProfile(
        $profile,
        array $uidList,
        $onlyPublished,
        $limit,
        $withOwner,
        $onlyMain,
        $page
    ) {
        $limit = max(1, (int) $limit);
        $offset = max(0, ($page - 1) * $limit);
        $params = array(':profile' => $profile);
        $uidSql = '';
        if ($uidList) {
            $placeholders = array();
            foreach ($uidList as $i => $uid) {
                $key = ':uid' . $i;
                $placeholders[] = $key;
                $params[$key] = (int) $uid;
            }
            $uidSql = ' AND a.owner_uid IN (' . implode(',', $placeholders) . ')';
        }

        $mainSql = $onlyMain ? ' AND (a.parent_attachment_id IS NULL OR a.parent_attachment_id = 0)' : '';

        if ($withOwner) {
            $from = "FROM `{$this->table}` a
                    JOIN project p ON p.id = (a.owner_uid DIV 256)
                    WHERE a.profile_name = :profile" . $uidSql . $mainSql;
            if ($onlyPublished) {
                $from .= " AND p.status = 'published'";
            }

            $countStmt = $this->pdo()->prepare('SELECT COUNT(*) ' . $from);
            $countStmt->execute($params);
            $total = (int) $countStmt->fetchColumn();

            $sql = "SELECT a.*, p.id AS p_id, p.name AS p_name,
                           p.symbol_alpha, p.symbol_num, p.type AS p_type, p.status AS p_status
                    " . $from . ' ORDER BY a.id DESC LIMIT ' . (int) $limit . ' OFFSET ' . (int) $offset;
            $stmt = $this->pdo()->prepare($sql);
            $stmt->execute($params);
            $rows = array_map(array($this, 'mapAttachmentProfileRow'), $stmt->fetchAll());
            return array('rows' => $rows, 'total' => $total);
        }

        $from = "FROM `{$this->table}` a WHERE a.profile_name = :profile" . $uidSql . $mainSql;
        $countStmt = $this->pdo()->prepare('SELECT COUNT(*) ' . $from);
        $countStmt->execute($params);
        $total = (int) $countStmt->fetchColumn();

        $sql = 'SELECT a.* ' . $from . ' ORDER BY a.id DESC LIMIT ' . (int) $limit . ' OFFSET ' . (int) $offset;
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute($params);
        return array('rows' => $stmt->fetchAll(), 'total' => $total);
    }

    /**
     * @param array $row
     * @return array
     */
    private function mapAttachmentProfileRow(array $row)
    {
        return array(
            'id'           => (int) $row['id'],
            'profile_name' => $row['profile_name'],
            'owner_uid'    => $row['owner_uid'],
            'filename'     => $row['filename'],
            'path'         => isset($row['path']) ? $row['path'] : '',
            'title'        => isset($row['title']) ? $row['title'] : '',
            'props'        => isset($row['props']) ? $row['props'] : null,
            'sorting'      => (int) (isset($row['sorting']) ? $row['sorting'] : 0),
            'object'       => array(
                'id'           => (int) $row['p_id'],
                'name'         => $row['p_name'],
                'symbol_alpha' => $row['symbol_alpha'],
                'symbol_num'   => $row['symbol_num'],
                'type'         => $row['p_type'],
                'status'       => $row['p_status'],
            ),
        );
    }
}
