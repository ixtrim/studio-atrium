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
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    /**
     * Latest root thread (parent_id = 0) per forum category — used by /forum/.
     */
    public function getLastThreads(): EntityCollection
    {
        $sql = "SELECT p.*
            FROM discuss_post p
            INNER JOIN (
                SELECT cat_id, MAX(id) AS max_id
                FROM discuss_post
                WHERE status = 'published' AND parent_id = 0
                GROUP BY cat_id
            ) latest ON latest.max_id = p.id
            ORDER BY p.cat_id ASC";

        $stmt = $this->pdo->query($sql);
        $rows = $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : [];
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    /**
     * @param int  $id
     * @param bool $withExtras   load lightweight user stub when true
     * @param bool $unused
     * @param bool $publishedOnly
     * @param bool $withParent
     * @return Post|false
     */
    public function getById($id, $withExtras = false, $unused = false, $publishedOnly = true, $withParent = false)
    {
        $sql = 'SELECT * FROM discuss_post WHERE id = :id';
        if ($publishedOnly) {
            $sql .= " AND status = 'published'";
        }
        $sql .= ' LIMIT 1';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => (int) $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$row) {
            return false;
        }

        $post = $this->hydrate($row);
        $post->_uid = $post->getAuthorId();

        if ($withExtras && $post->getAuthorId()) {
            $post->user = [
                'props' => [
                    'forum' => $this->getAuthorForumStats($post->getAuthorId()),
                ],
            ];
        }

        if ($withParent && $post->getParentId()) {
            $parent = $this->getById($post->getParentId(), false, false, false, false);
            if ($parent) {
                $post->parent = $parent->toArray();
            }
        }

        return $post;
    }

    /**
     * Replies for a thread root. $page is 0-based.
     * When $limit is false, return all children (no pagination).
     *
     * @return EntityCollection|false
     */
    public function getThread($parentId, $page = 0, $limit = 20, $publishedOnly = true)
    {
        $parentId = (int) $parentId;
        $where = 'parent_id = :pid';
        $params = [':pid' => $parentId];
        if ($publishedOnly) {
            $where .= " AND status = 'published'";
        }

        $countStmt = $this->pdo->prepare("SELECT COUNT(*) FROM discuss_post WHERE {$where}");
        $countStmt->execute($params);
        $total = (int) $countStmt->fetchColumn();
        if ($total < 1) {
            return false;
        }

        $sql = "SELECT * FROM discuss_post WHERE {$where} ORDER BY create_date ASC, id ASC";
        if ($limit !== false && $limit !== null) {
            $limit = max(1, (int) $limit);
            $page = max(0, (int) $page);
            $offset = $page * $limit;
            $sql .= " LIMIT {$limit} OFFSET {$offset}";
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $items = [];
        foreach ($rows as $row) {
            $post = $this->hydrate($row);
            if ($post->getAuthorId()) {
                $post->user = [
                    'props' => [
                        'forum' => $this->getAuthorForumStats($post->getAuthorId()),
                    ],
                ];
            }
            $items[] = $post;
        }

        return new EntityCollection($items, $total);
    }

    /**
     * @return array|false single notify row-like object, or false
     */
    public function getUserPostNotification($userId, $postId)
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM discuss_notify WHERE user_id = :uid AND discuss_post_id = :pid LIMIT 1'
        );
        $stmt->execute([
            ':uid' => (int) $userId,
            ':pid' => (int) $postId,
        ]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ?: false;
    }

    /**
     * @return array
     */
    public function getNotifications($postId)
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM discuss_notify WHERE discuss_post_id = :pid'
        );
        $stmt->execute([':pid' => (int) $postId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC) ?: [];
    }

    public function getTreeByProjectId($projectId, $catId = null, $publishedOnly = true, $withChildren = true)
    {
        $sql = 'SELECT * FROM discuss_post WHERE project_id = :project_id';
        $params = [':project_id' => (int) $projectId];

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
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!$withChildren) {
            $items = [];
            foreach ($rows as $row) {
                $items[] = $this->rowToArray($row);
            }
            return $items;
        }

        $roots = [];
        $children = [];

        foreach ($rows as $row) {
            $item = $this->rowToArray($row);
            $parentId = (int) $row['parent_id'];
            if ($parentId === 0) {
                $item['children'] = [];
                $roots[$row['id']] = $item;
            } else {
                if (!isset($children[$parentId])) {
                    $children[$parentId] = [];
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

    /**
     * Latest project comments for /forum/komentarze (project_comment table).
     * @return array{list: array, count: int}|false
     */
    public function getLatestProjectComments($offset = 0, $limit = 20)
    {
        $offset = max(0, (int) $offset);
        $limit = max(1, (int) $limit);

        $count = (int) $this->pdo->query(
            "SELECT COUNT(*) FROM project_comment WHERE parent_id = 0 AND status = 'published' AND type = 'comment'"
        )->fetchColumn();
        if ($count < 1) {
            return false;
        }

        $sql = "SELECT c.*
            FROM project_comment c
            WHERE c.parent_id = 0 AND c.status = 'published' AND c.type = 'comment'
            ORDER BY c.publish_date DESC, c.id DESC
            LIMIT {$limit} OFFSET {$offset}";
        $rows = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        if (!$rows) {
            return false;
        }

        $list = [];
        foreach ($rows as $row) {
            $item = [
                'id'           => (int) $row['id'],
                'content'      => $row['content'] ?? '',
                'author'       => $row['author'] ?? '',
                'user_id'      => isset($row['user_id']) ? (int) $row['user_id'] : 0,
                'publish_date' => $row['publish_date'] ?? '',
                'project_id'   => (int) $row['project_id'],
                'children'     => [],
            ];

            $childStmt = $this->pdo->prepare(
                "SELECT * FROM project_comment
                 WHERE parent_id = :pid AND status = 'published'
                 ORDER BY publish_date DESC, id DESC LIMIT 1"
            );
            $childStmt->execute([':pid' => (int) $row['id']]);
            $child = $childStmt->fetch(\PDO::FETCH_ASSOC);
            if ($child) {
                $item['children'][] = [
                    'id'           => (int) $child['id'],
                    'content'      => $child['content'] ?? '',
                    'author'       => $child['author'] ?? '',
                    'user_id'      => isset($child['user_id']) ? (int) $child['user_id'] : 0,
                    'publish_date' => $child['publish_date'] ?? '',
                ];
            }
            $list[] = $item;
        }

        return ['list' => $list, 'count' => $count];
    }

    private function getAuthorForumStats($authorId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(*) AS cnt, MIN(create_date) AS first_date
             FROM discuss_post WHERE author_id = :aid AND status = 'published'"
        );
        $stmt->execute([':aid' => (int) $authorId]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC) ?: [];
        return [
            'count' => (int) ($row['cnt'] ?? 0),
            'date'  => !empty($row['first_date']) ? date('Y-m-d', strtotime($row['first_date'])) : '-',
        ];
    }

    private function rowToArray(array $row)
    {
        return [
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
        ];
    }

    private function hydrate(array $row): Post
    {
        $p = new Post();
        $p->setId((int) $row['id']);
        $p->setParentId(isset($row['parent_id']) ? (int) $row['parent_id'] : 0);
        $p->setCatId(isset($row['cat_id']) ? (int) $row['cat_id'] : 0);
        $p->setAuthorId(isset($row['author_id']) ? (int) $row['author_id'] : 0);
        $p->setProjectId(isset($row['project_id']) ? (int) $row['project_id'] : 0);
        $p->setNick($row['nick'] ?? '');
        $p->setTopic($row['topic'] ?? '');
        $p->setContent($row['content'] ?? '');
        $p->setCreateDate($row['create_date'] ?? '');
        $p->setModifyDate($row['modify_date'] ?? '');
        $p->setStatus($row['status'] ?? 'published');
        $p->setIsModerated(isset($row['is_moderated']) ? (int) $row['is_moderated'] : 0);
        return $p;
    }
}
