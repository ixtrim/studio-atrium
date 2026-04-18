<?php
class Point7_CMS_Attachment_DAO_PDOMySQL
{
    private ?PDO    $pdo       = null;
    private string  $table     = 'attachment';
    private string  $setNames  = 'utf8';

    public function configure(string $key, mixed $value): void
    {
        match ($key) {
            'pdo_handle' => $this->pdo      = $value,
            'table_name' => $this->table    = (string)$value,
            'set_names'  => $this->setNames = (string)$value,
            default      => null,
        };
    }

    private function pdo(): PDO
    {
        if (!$this->pdo) {
            $this->pdo = Point7_WebApp::getPDO();
        }
        return $this->pdo;
    }

    public function getForObject(string $uid, ?string $profile = null): array
    {
        $sql    = "SELECT * FROM `{$this->table}` WHERE owner_uid = :uid";
        $params = [':uid' => $uid];
        if ($profile !== null) {
            $sql      .= ' AND profile_name = :profile';
            $params[':profile'] = $profile;
        }
        $sql .= ' ORDER BY sort_order ASC';
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute($params);
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    public function getWithChildren(int $id): ?Point7_CMS_Attachment
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM `{$this->table}` WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        if (!$row) return null;

        $attachment = $this->hydrate($row);

        // Fetch children
        $stmt2 = $this->pdo()->prepare("SELECT * FROM `{$this->table}` WHERE parent_id = :pid ORDER BY sort_order ASC");
        $stmt2->execute([':pid' => $id]);
        $children = array_map([$this, 'hydrate'], $stmt2->fetchAll());
        $attachment->setChildAttachments($children);

        return $attachment;
    }

    public function store(Point7_CMS_Attachment $a): void
    {
        if ($a->getId()) {
            $stmt = $this->pdo()->prepare(
                "UPDATE `{$this->table}` SET owner_uid=:uid, filename=:fn, path=:path,
                 profile_name=:profile, title=:title, description=:desc, props=:props,
                 sort_order=:sort WHERE id=:id"
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
                "INSERT INTO `{$this->table}` (owner_uid, filename, path, profile_name, title, description, props, sort_order)
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
        $a->setSortOrder((int)($row['sort_order'] ?? 0));
        return $a;
    }

    /**
     * Get attachments by profile, optionally joined with their project owner.
     * Uses slot formula: owner_uid = projectId * 256 + 2 for project attachments.
     *
     * @param string $profile  Profile name (e.g. 'ProjectRealisation')
     * @param bool $onlyPublished  Only include attachments whose project is published
     * @param int $limit
     * @param bool $withOwner  Include owner project data in result
     * @param bool $onlyMain  (ignored — reserved for future use)
     * @param bool $asArray  (ignored — always returns array)
     */
    public function getAttachmentsByProfile(
        string $profile,
        bool $onlyPublished = true,
        int $limit = 10,
        bool $withOwner = true,
        bool $onlyMain = false,
        bool $asArray = true
    ): array {
        if ($withOwner) {
            $sql = "SELECT a.*, p.id AS p_id, p.name AS p_name,
                           p.symbol_alpha, p.symbol_num, p.type AS p_type, p.status AS p_status
                    FROM `{$this->table}` a
                    JOIN project p ON p.id = (a.owner_uid DIV 256)
                    WHERE a.profile_name = :profile";
            if ($onlyPublished) {
                $sql .= " AND p.status = 'published'";
            }
            $sql .= ' ORDER BY a.id DESC LIMIT :limit';

            $stmt = $this->pdo()->prepare($sql);
            $stmt->bindValue(':profile', $profile);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();

            return array_map(function (array $row) {
                return [
                    'id'           => (int)$row['id'],
                    'profile_name' => $row['profile_name'],
                    'owner_uid'    => $row['owner_uid'],
                    'filename'     => $row['filename'],
                    'path'         => $row['path'] ?? '',
                    'title'        => $row['title'] ?? '',
                    'props'        => $row['props'] ?? null,
                    'sorting'      => (int)($row['sorting'] ?? 0),
                    'object'       => [
                        'id'           => (int)$row['p_id'],
                        'name'         => $row['p_name'],
                        'symbol_alpha' => $row['symbol_alpha'],
                        'symbol_num'   => $row['symbol_num'],
                        'type'         => $row['p_type'],
                        'status'       => $row['p_status'],
                    ],
                ];
            }, $rows);
        }

        $sql = "SELECT * FROM `{$this->table}` WHERE profile_name = :profile ORDER BY id DESC LIMIT :limit";
        $stmt = $this->pdo()->prepare($sql);
        $stmt->bindValue(':profile', $profile);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
