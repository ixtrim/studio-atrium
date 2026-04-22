<?php
namespace StudioAtrium\Entity\Document;

use StudioAtrium\Entity\Document;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param string|false|null $doctype  false = article+news, null = all, string = specific type
     * @param string|null $charId
     * @param string|null $status
     * @param int|null $limit           null = no LIMIT (Index.php/Project.php's partner lookups)
     * @param int $page                 1-based page number (Article::doHashTag passes the
     *                                  request's raw ?page=, Index.php passes 0 for its
     *                                  fixed 3-item box - both normalize to offset 0 here)
     * @param string|null $search       matched against title/content
     * @param int|null $tagId           filters to documents tagged with this hash_tag id
     * @param bool $latestFirst
     */
    public function getList(
        $doctype = null,
        $charId = null,
        $status = null,
        $limit = null,
        $page = 1,
        $search = null,
        $tagId = null,
        bool $latestFirst = false
    ): EntityCollection {
        $where = [];
        $params = [];
        $joins = '';

        if ($doctype === false) {
            $where[] = "d.doctype IN ('article','news')";
        } elseif ($doctype !== null && $doctype !== '') {
            $where[] = 'd.doctype = :doctype';
            $params[':doctype'] = $doctype;
        }

        if ($charId !== null) {
            $where[] = 'd.char_id = :char_id';
            $params[':char_id'] = $charId;
        }

        if ($status !== null && $status !== '') {
            $where[] = 'd.status = :status';
            $params[':status'] = $status;
        }

        if ($search !== null && $search !== '') {
            $where[] = '(d.title LIKE :search OR d.content LIKE :search)';
            $params[':search'] = '%' . $search . '%';
        }

        if (!empty($tagId)) {
            $joins .= ' INNER JOIN document_to_hash_tag dht ON dht.object_id = d.id AND dht.hash_tag_id = :tag_id';
            $params[':tag_id'] = $tagId;
        }

        $where[] = 'd.not_listing = 0';

        $whereSql = $where ? ' WHERE ' . implode(' AND ', $where) : '';
        $orderSql = $latestFirst ? ' ORDER BY d.publish_date DESC, d.id DESC' : ' ORDER BY d.id ASC';

        $countStmt = $this->pdo->prepare("SELECT COUNT(*) FROM document d{$joins}{$whereSql}");
        $countStmt->execute($params);
        $total = (int)$countStmt->fetchColumn();

        $sql = "SELECT d.* FROM document d{$joins}{$whereSql}{$orderSql}";
        if ($limit !== null) {
            $page = max(1, (int)$page);
            $offset = ($page - 1) * (int)$limit;
            $sql .= ' LIMIT ' . (int)$limit . ' OFFSET ' . $offset;
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        $docs = array_map([$this, 'hydrate'], $rows);
        return new EntityCollection($docs, $total);
    }

    /**
     * @param int $id
     * @param mixed $_unused  kept for call-site compatibility (Article.php passes a
     *                        second positional arg here whose intent wasn't recoverable)
     * @param string|null $status  when given, only matches if the document has this status
     * @param mixed $_unused2  kept for call-site compatibility
     */
    public function getById($id, $_unused = false, $status = null, $_unused2 = true)
    {
        $where = ['id = :id'];
        $params = [':id' => (int)$id];
        if ($status) {
            $where[] = 'status = :status';
            $params[':status'] = $status;
        }

        $stmt = $this->pdo->prepare('SELECT * FROM document WHERE ' . implode(' AND ', $where) . ' LIMIT 1');
        $stmt->execute($params);
        $row = $stmt->fetch();

        return $row ? $this->hydrate($row) : null;
    }

    /**
     * Returns a collection (usually 0 or 1 rows - char_id isn't guaranteed unique
     * in the schema) so callers can use ->current() the same way they would on
     * getList()'s result.
     */
    public function getByCharId($charId, $doctype = null, $status = null): EntityCollection
    {
        $where = ['char_id = :char_id'];
        $params = [':char_id' => $charId];

        if ($doctype !== null && $doctype !== '') {
            $where[] = 'doctype = :doctype';
            $params[':doctype'] = $doctype;
        }
        if ($status !== null && $status !== '') {
            $where[] = 'status = :status';
            $params[':status'] = $status;
        }

        $stmt = $this->pdo->prepare('SELECT * FROM document WHERE ' . implode(' AND ', $where));
        $stmt->execute($params);
        $docs = array_map([$this, 'hydrate'], $stmt->fetchAll());

        return new EntityCollection($docs);
    }

    private function hydrate(array $row): Document
    {
        $d = new Document();
        $d->setId((int)$row['id']);
        $d->setTitle($row['title'] ?? '');
        $d->setTeaser($row['teaser'] ?? null);
        $d->setContent($row['content'] ?? null);
        $d->setStatus($row['status'] ?? 'published');
        $d->setDoctype($row['doctype'] ?? 'article');
        $d->setCharId($row['char_id'] ?? null);
        $d->setKeywords($row['keywords'] ?? null);
        $d->setPublishDate($row['publish_date'] ?? null);
        $d->setMetaTitle($row['meta_title'] ?? null);
        $d->setMetaDescription($row['meta_description'] ?? null);
        $d->setExtraData($row['extra_data'] ?? null);
        $d->setNotListing((int)($row['not_listing'] ?? 0));
        return $d;
    }
}
