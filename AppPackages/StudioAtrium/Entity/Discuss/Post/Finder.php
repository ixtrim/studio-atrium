<?php
namespace StudioAtrium\Entity\Discuss\Post;

use StudioAtrium\Entity\Discuss\Post;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
    public function __construct(private \PDO $pdo) {}

    public function getLastPosts(int $limit = 5): EntityCollection
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM discuss_post WHERE status = 'published' ORDER BY create_date DESC LIMIT :limit"
        );
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    private function hydrate(array $row): Post
    {
        $p = new Post();
        $p->setId((int)$row['id']);
        $p->setParentId(isset($row['parent_id']) ? (int)$row['parent_id'] : null);
        $p->setCatId(isset($row['cat_id']) ? (int)$row['cat_id'] : null);
        $p->setAuthorId(isset($row['author_id']) ? (int)$row['author_id'] : null);
        $p->setProjectId(isset($row['project_id']) ? (int)$row['project_id'] : null);
        $p->setNick($row['nick'] ?? '');
        $p->setTopic($row['topic'] ?? '');
        $p->setContent($row['content'] ?? '');
        $p->setCreateDate($row['create_date'] ?? '');
        $p->setStatus($row['status'] ?? 'published');
        return $p;
    }
}
