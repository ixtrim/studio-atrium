<?php
namespace StudioAtrium\Entity\Discuss\Post;

use StudioAtrium\Entity\Discuss\Post;
use StudioAtrium\Entity\EntityCollection;

/**
 * PDO DAO for discuss_post — read/search/store used by /forum/.
 */
class DAO
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Category thread list with latest reply preview.
     * @return array{list: array, count: int}|false
     */
    public function getLastPosts($catId, $offset = 0, $limit = 20)
    {
        $catId = (int) $catId;
        $offset = max(0, (int) $offset);
        $limit = max(1, (int) $limit);

        $countStmt = $this->pdo->prepare(
            "SELECT COUNT(*) FROM discuss_post
             WHERE parent_id = 0 AND cat_id = :cat AND status = 'published'"
        );
        $countStmt->execute([':cat' => $catId]);
        $count = (int) $countStmt->fetchColumn();
        if ($count < 1) {
            return false;
        }

        $sql = "SELECT p.*,
                s.id AS subid,
                s.author_id AS subauthorid,
                s.nick AS subnick,
                s.create_date AS subdate,
                s.content AS subcontent
            FROM discuss_post p
            LEFT JOIN discuss_post s ON s.id = (
                SELECT id FROM discuss_post
                WHERE parent_id = p.id AND status = 'published'
                ORDER BY create_date DESC, id DESC
                LIMIT 1
            )
            WHERE p.parent_id = 0 AND p.cat_id = :cat AND p.status = 'published'
            ORDER BY COALESCE(s.create_date, p.modify_date, p.create_date) DESC, p.id DESC
            LIMIT {$limit} OFFSET {$offset}";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':cat' => $catId]);
        $list = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return ['list' => $list ?: [], 'count' => $count];
    }

    /**
     * @return array{list: array, count: int}|false
     */
    public function search($query, $projectId = false, $offset = 0, $limit = 20)
    {
        return $this->runSearch($query, false, $projectId, $offset, $limit);
    }

    /**
     * @return array{list: array, count: int}|false
     */
    public function searchProject($projectId, $offset = 0, $limit = 20)
    {
        return $this->runSearch(false, false, $projectId, $offset, $limit);
    }

    /**
     * @return array{list: array, count: int}|false
     */
    public function searchCategory($query, $categoryId, $projectId = false, $offset = 0, $limit = 20)
    {
        return $this->runSearch($query, $categoryId, $projectId, $offset, $limit);
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM discuss_post WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => (int) $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ? $this->hydrate($row) : false;
    }

    /**
     * @param Post|EntityCollection|array $entity
     */
    public function store($entity)
    {
        if ($entity instanceof EntityCollection || is_array($entity)) {
            foreach ($entity as $item) {
                $this->store($item);
            }
            return;
        }

        /** @var Post $entity */
        if ($entity->getId()) {
            $stmt = $this->pdo->prepare(
                'UPDATE discuss_post SET
                    parent_id = :parent_id,
                    cat_id = :cat_id,
                    author_id = :author_id,
                    project_id = :project_id,
                    nick = :nick,
                    topic = :topic,
                    content = :content,
                    modify_date = :modify_date,
                    status = :status,
                    is_moderated = :is_moderated
                 WHERE id = :id'
            );
            $stmt->execute([
                ':parent_id' => (int) $entity->getParentId(),
                ':cat_id' => (int) $entity->getCatId(),
                ':author_id' => (int) $entity->getAuthorId(),
                ':project_id' => (int) $entity->getProjectId(),
                ':nick' => $entity->getNick(),
                ':topic' => $entity->getTopic() !== '' ? $entity->getTopic() : null,
                ':content' => $entity->getContent(),
                ':modify_date' => $entity->getModifyDate() ?: date('Y-m-d H:i:s'),
                ':status' => $entity->getStatus() ?: 'published',
                ':is_moderated' => (int) $entity->getIsModerated(),
                ':id' => (int) $entity->getId(),
            ]);
        } else {
            $stmt = $this->pdo->prepare(
                'INSERT INTO discuss_post
                    (parent_id, cat_id, author_id, project_id, nick, topic, content, create_date, modify_date, status, is_moderated)
                 VALUES
                    (:parent_id, :cat_id, :author_id, :project_id, :nick, :topic, :content, :create_date, :modify_date, :status, :is_moderated)'
            );
            $create = $entity->getCreateDate() ?: date('Y-m-d H:i:s');
            $stmt->execute([
                ':parent_id' => (int) $entity->getParentId(),
                ':cat_id' => (int) $entity->getCatId(),
                ':author_id' => (int) $entity->getAuthorId(),
                ':project_id' => (int) $entity->getProjectId(),
                ':nick' => $entity->getNick(),
                ':topic' => $entity->getTopic() !== '' ? $entity->getTopic() : null,
                ':content' => $entity->getContent(),
                ':create_date' => $create,
                ':modify_date' => $entity->getModifyDate() ?: $create,
                ':status' => $entity->getStatus() ?: 'published',
                ':is_moderated' => (int) $entity->getIsModerated(),
            ]);
            $entity->setId((int) $this->pdo->lastInsertId());
        }
    }

    private function runSearch($query, $categoryId, $projectId, $offset, $limit)
    {
        $offset = max(0, (int) $offset);
        $limit = max(1, (int) $limit);

        $where = ["p.status = 'published'"];
        $params = [];

        if ($categoryId !== false && $categoryId !== null && (int) $categoryId > 0) {
            $where[] = 'p.cat_id = :cat';
            $params[':cat'] = (int) $categoryId;
        }
        if ($projectId !== false && $projectId !== null && (int) $projectId > 0) {
            $where[] = 'p.project_id = :pid';
            $params[':pid'] = (int) $projectId;
        }
        if ($query) {
            $where[] = 'MATCH(p.topic, p.content) AGAINST (:q IN BOOLEAN MODE)';
            // BOOLEAN MODE: require all words as prefixes when possible
            $words = preg_split('/\s+/', trim($query));
            $bool = [];
            foreach ($words as $w) {
                $w = preg_replace('/[+\-~<>()\"@]/', '', $w);
                if ($w !== '') {
                    $bool[] = '+' . $w . '*';
                }
            }
            $params[':q'] = $bool ? implode(' ', $bool) : $query;
        }

        $whereSql = implode(' AND ', $where);

        $countStmt = $this->pdo->prepare("SELECT COUNT(*) FROM discuss_post p WHERE {$whereSql}");
        $countStmt->execute($params);
        $count = (int) $countStmt->fetchColumn();
        if ($count < 1) {
            return false;
        }

        $sql = "SELECT
                p.id,
                p.parent_id,
                p.cat_id,
                p.project_id,
                p.content,
                p.author_id AS uid,
                p.nick AS unick,
                p.create_date AS pdate,
                p.topic AS ptitle,
                parent.topic AS dadtopic
            FROM discuss_post p
            LEFT JOIN discuss_post parent ON parent.id = p.parent_id
            WHERE {$whereSql}
            ORDER BY p.create_date DESC, p.id DESC
            LIMIT {$limit} OFFSET {$offset}";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $list = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return ['list' => $list ?: [], 'count' => $count];
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
