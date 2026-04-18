<?php
namespace StudioAtrium\Entity\Document;

use StudioAtrium\Entity\Document;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
    public function __construct(private \PDO $pdo) {}

    /**
     * @param string|false|null $doctype  false = article+news, null = all, string = specific type
     * @param string|null $charId
     * @param string|null $status
     * @param int|null $limit
     * @param int $offset
     * @param mixed $catId  (ignored)
     * @param int $notListing  if 1, include not_listing docs
     * @param bool $latestFirst
     */
    public function getList(
        $doctype = null,
        ?string $charId = null,
        ?string $status = null,
        ?int $limit = null,
        int $offset = 0,
        $catId = null,
        int $notListing = 0,
        bool $latestFirst = false
    ): EntityCollection {
        $where = [];
        $params = [];

        if ($doctype === false) {
            $where[] = "doctype IN ('article','news')";
        } elseif ($doctype !== null && $doctype !== '') {
            $where[] = 'doctype = :doctype';
            $params[':doctype'] = $doctype;
        }

        if ($charId !== null) {
            $where[] = 'char_id = :char_id';
            $params[':char_id'] = $charId;
        }

        if ($status !== null) {
            $where[] = 'status = :status';
            $params[':status'] = $status;
        }

        if (!$notListing) {
            $where[] = 'not_listing = 0';
        }

        $sql = 'SELECT * FROM document';
        if ($where) {
            $sql .= ' WHERE ' . implode(' AND ', $where);
        }
        $sql .= $latestFirst ? ' ORDER BY publish_date DESC, id DESC' : ' ORDER BY id ASC';

        if ($limit !== null) {
            $sql .= ' LIMIT ' . (int)$limit;
            if ($offset) {
                $sql .= ' OFFSET ' . (int)$offset;
            }
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        $docs = array_map([$this, 'hydrate'], $rows);
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
