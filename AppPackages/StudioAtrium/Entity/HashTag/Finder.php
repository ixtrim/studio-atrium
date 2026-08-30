<?php
namespace StudioAtrium\Entity\HashTag;

/**
 * `StudioAtrium\Entity\HashTag\Finder` didn't exist at all - Article.php's
 * doHashTag()/doItem()/doSend() and ForumArchive.php all fatal on
 * getHashTagFinder(). Built directly on PDO (see DAORepository::getHashTagFinder()
 * for why), reading the `hash_tag` and `document_to_hash_tag` tables.
 */
class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * All tags, grouped by type - matches Article::doHashTag()'s
     * isset($allTags['main'][$tagId]) / $allTags['normal'][$tagId] usage.
     *
     * @return array{main: array<int,string>, normal: array<int,string>}
     */
    public function getList(): array
    {
        $stmt = $this->pdo->query('SELECT id, tag, type FROM hash_tag ORDER BY tag ASC');
        $result = ['main' => [], 'normal' => []];
        foreach ($stmt->fetchAll() as $row) {
            $type = ($row['type'] === 'main') ? 'main' : 'normal';
            $result[$type][(int)$row['id']] = $row['tag'];
        }
        return $result;
    }

    /**
     * Tags attached to a single document (Article::doItem() -> $documentTags).
     * Keyed by hash_tag_id so templates can use {$documentTags as $tid => $tag}
     * with $allTags.main[$tid] / $allTags.normal[$tid].
     */
    public function getTagsForDocument($document): array
    {
        if (!$document) {
            return [];
        }
        $id = is_object($document) && method_exists($document, 'getId')
            ? (int) $document->getId()
            : (int) (is_array($document) ? ($document['id'] ?? 0) : $document);
        if ($id <= 0) {
            return [];
        }

        $stmt = $this->pdo->prepare(
            'SELECT ht.id AS hash_tag_id, ht.tag, ht.type, dht.object_id
             FROM document_to_hash_tag dht
             INNER JOIN hash_tag ht ON ht.id = dht.hash_tag_id
             WHERE dht.object_id = :id
             ORDER BY ht.tag ASC'
        );
        $stmt->execute([':id' => $id]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (!$rows) {
            return [];
        }

        $out = [];
        foreach ($rows as $row) {
            $tid = (int) $row['hash_tag_id'];
            $out[$tid] = $row;
        }
        return $out;
    }

    /**
     * Batch-loads tags for a list of documents and writes them into
     * $documents[$i]['tags'] in place - Article::doHashTag() passes the
     * array from $articles->toArray() straight through without capturing a
     * return value, so this must mutate by reference.
     *
     * @param array[] $documents array of document arrays (each with an 'id' key)
     */
    public function getTagsForDocuments(array &$documents)
    {
        if (!$documents) {
            return;
        }

        $ids = [];
        foreach ($documents as $doc) {
            if (!empty($doc['id'])) {
                $ids[] = (int)$doc['id'];
            }
        }
        if (!$ids) {
            return;
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare(
            "SELECT dht.object_id, ht.id, ht.tag, ht.type
             FROM document_to_hash_tag dht
             INNER JOIN hash_tag ht ON ht.id = dht.hash_tag_id
             WHERE dht.object_id IN ($placeholders)"
        );
        $stmt->execute($ids);

        $byDocument = [];
        foreach ($stmt->fetchAll() as $row) {
            $byDocument[(int)$row['object_id']][] = [
                'id'   => (int)$row['id'],
                'tag'  => $row['tag'],
                'type' => $row['type'],
            ];
        }

        foreach ($documents as &$doc) {
            $id = (int)($doc['id'] ?? 0);
            $doc['tags'] = $byDocument[$id] ?? [];
        }
        unset($doc);
    }
}
