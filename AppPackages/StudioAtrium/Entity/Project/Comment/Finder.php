<?php
namespace StudioAtrium\Entity\Project\Comment;

use StudioAtrium\Entity\Project\Comment;

class Finder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function configure(array $config)
    {
    }

    public function getTreeByProjectId($projectId, $type = null)
    {
        $sql = "SELECT * FROM project_comment
                WHERE project_id = :project_id AND status = 'published'";
        $params = array(':project_id' => (int) $projectId);

        if ($type !== null && $type !== '') {
            $sql .= ' AND type = :type';
            $params[':type'] = $type;
        }

        $sql .= ' ORDER BY publish_date ASC, id ASC';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll();

        if ($type === Comment::TYPE_OPINION) {
            $items = array();
            foreach ($rows as $row) {
                $items[] = $this->rowToArray($row);
            }
            return $items;
        }

        return $this->buildTree($rows);
    }

    private function buildTree(array $rows)
    {
        $items = array();
        $children = array();

        foreach ($rows as $row) {
            $item = $this->rowToArray($row);
            $parentId = (int) $row['parent_id'];
            if ($parentId === 0) {
                $item['children'] = array();
                $items[$row['id']] = $item;
            } else {
                if (!isset($children[$parentId])) {
                    $children[$parentId] = array();
                }
                $children[$parentId][] = $item;
            }
        }

        foreach ($children as $parentId => $childRows) {
            if (isset($items[$parentId])) {
                $items[$parentId]['children'] = $childRows;
            }
        }

        return array_values($items);
    }

    private function rowToArray(array $row)
    {
        return array(
            'id'           => (int) $row['id'],
            'title'        => isset($row['title']) ? $row['title'] : null,
            'content'      => isset($row['content']) ? $row['content'] : '',
            'email'        => isset($row['email']) ? $row['email'] : '',
            'author'       => isset($row['author']) ? $row['author'] : '',
            'user_id'      => isset($row['user_id']) ? (int) $row['user_id'] : 0,
            'parent_id'    => isset($row['parent_id']) ? (int) $row['parent_id'] : 0,
            'publish_date' => isset($row['publish_date']) ? $row['publish_date'] : '',
            'status'       => isset($row['status']) ? $row['status'] : 'published',
            'show_email'   => isset($row['show_email']) ? (int) $row['show_email'] : 0,
            'project_id'   => isset($row['project_id']) ? (int) $row['project_id'] : 0,
            'type'         => isset($row['type']) ? $row['type'] : Comment::TYPE_COMMENT,
        );
    }
}
