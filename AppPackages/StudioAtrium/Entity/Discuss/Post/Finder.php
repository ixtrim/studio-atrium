<?php
namespace StudioAtrium\Entity\Discuss\Post;

use StudioAtrium\Entity\Discuss\Post;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
        private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

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

    public function getTreeByProjectId($projectId, $catId = null, $publishedOnly = true, $withChildren = true)
    {
        $sql = 'SELECT * FROM discuss_post WHERE project_id = :project_id';
        $params = array(':project_id' => (int) $projectId);

        if ($publishedOnly) {
            $sql .= " AND status = 'published'";
        }
        if ($catId !== null && $catId !== false && $catId !== '') {
            $sql .= ' AND cat_id = :cat_id';
            $params[':cat_id'] = (int) $catId;
        }

        $sql .= ' ORDER BY create_date ASC, id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        if (!$withChildren) {
            $items = array();
            foreach ($rows as $row) {
                $items[] = $this->rowToArray($row);
            }
            return $items;
        }

        $roots = array();
        $children = array();

        foreach ($rows as $row) {
            $item = $this->rowToArray($row);
            $parentId = (int) $row['parent_id'];
            if ($parentId === 0) {
                $item['children'] = array();
                $roots[$row['id']] = $item;
            } else {
                if (!isset($children[$parentId])) {
                    $children[$parentId] = array();
                }
                $children[$parentId][] = $item;
            }
        }

        foreach ($children as $parentId => $childRows) {
            if (isset($roots[$parentId])) {
                $roots[$parentId]['children'] = $childRows;
            }
        }

        return array_values($roots);
    }

    private function rowToArray(array $row)
    {
        return array(
            'id'            => (int) $row['id'],
            'parent_id'     => isset($row['parent_id']) ? (int) $row['parent_id'] : 0,
            'cat_id'        => isset($row['cat_id']) ? (int) $row['cat_id'] : 0,
            'author_id'     => isset($row['author_id']) ? (int) $row['author_id'] : 0,
            'project_id'    => isset($row['project_id']) ? (int) $row['project_id'] : 0,
            'nick'          => isset($row['nick']) ? $row['nick'] : '',
            'topic'         => isset($row['topic']) ? $row['topic'] : null,
            'content'       => isset($row['content']) ? $row['content'] : '',
            'create_date'   => isset($row['create_date']) ? $row['create_date'] : '',
            'modify_date'   => isset($row['modify_date']) ? $row['modify_date'] : '',
            'status'        => isset($row['status']) ? $row['status'] : 'published',
            'is_moderated'  => isset($row['is_moderated']) ? (int) $row['is_moderated'] : 0,
        );
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
