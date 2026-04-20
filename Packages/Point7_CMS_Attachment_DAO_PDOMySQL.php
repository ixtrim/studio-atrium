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
}
