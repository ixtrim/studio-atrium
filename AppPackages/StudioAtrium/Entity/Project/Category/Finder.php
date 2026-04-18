<?php
namespace StudioAtrium\Entity\Project\Category;

use StudioAtrium\Entity\Project\Category;
use StudioAtrium\Entity\EntityCollection;

class Finder
{
    public function __construct(private \PDO $pdo) {}

    public function getById(int $id): ?Category
    {
        $stmt = $this->pdo->prepare('SELECT * FROM project_category WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    public function getByLink(string $link): ?Category
    {
        $stmt = $this->pdo->prepare("SELECT * FROM project_category WHERE link = :link AND status = 'published' LIMIT 1");
        $stmt->execute([':link' => $link]);
        $row = $stmt->fetch();
        return $row ? $this->hydrate($row) : null;
    }

    /**
     * Returns all published categories as a flat EntityCollection.
     * Used by LoadMenuCommand to build the siteMenu tree.
     */
    public function getAll(): EntityCollection
    {
        $stmt = $this->pdo->query("SELECT * FROM project_category WHERE status = 'published' ORDER BY sorting ASC");
        $rows = $stmt->fetchAll();
        return new EntityCollection(array_map([$this, 'hydrate'], $rows));
    }

    /**
     * Build siteMenu tree structure for template:
     * ['house' => [...categories with children...], 'other' => [...]]
     */
    public function buildMenuTree(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM project_category WHERE status = 'published' ORDER BY sorting ASC");
        $rows = $stmt->fetchAll();

        $all = [];
        foreach ($rows as $row) {
            $all[(int)$row['id']] = $row;
        }

        $tree = ['house' => [], 'other' => []];

        // First pass: roots
        foreach ($all as $id => $row) {
            $parentId = (int)($row['parent_id'] ?? 0);
            if ($parentId === 0) {
                $item = $this->rowToMenuArray($row, []);
                $tree[$row['tree'] ?? 'house'][] = $item;
            }
        }

        // Second pass: attach children to parents
        foreach ($tree as $treeKey => $roots) {
            foreach ($tree[$treeKey] as &$root) {
                $rootId = $root['id'];
                $children = [];
                foreach ($all as $id => $row) {
                    if ((int)($row['parent_id'] ?? 0) === $rootId) {
                        $children[] = $this->rowToMenuArray($row, []);
                    }
                }
                usort($children, fn($a, $b) => $a['sorting'] <=> $b['sorting']);
                $root['children'] = $children;
            }
            unset($root);
        }

        return $tree;
    }

    private function rowToMenuArray(array $row, array $children): array
    {
        return [
            'id'                   => (int)$row['id'],
            'tree'                 => $row['tree'],
            'name'                 => $row['name'],
            'alternate_name'       => $row['alternate_name'] ?? null,
            'link'                 => $row['link'] ?? '',
            'parent_id'            => (int)($row['parent_id'] ?? 0),
            'description'          => $row['description'] ?? null,
            'short_description'    => $row['short_description'] ?? null,
            'project_list'         => $row['project_list'] ?? '',
            'project_list_by_area' => $row['project_list_by_area'] ?? '',
            'sorting'              => (int)($row['sorting'] ?? 0),
            'is_highlight'         => (int)($row['is_highlight'] ?? 0),
            'menu_position'        => isset($row['menu_position']) ? (int)$row['menu_position'] : null,
            'meta_title'           => $row['meta_title'] ?? null,
            'meta_description'     => $row['meta_description'] ?? null,
            'status'               => $row['status'],
            'children'             => $children,
        ];
    }

    private function hydrate(array $row): Category
    {
        $c = new Category();
        $c->setId((int)$row['id']);
        $c->setTree($row['tree'] ?? 'house');
        $c->setName($row['name'] ?? '');
        $c->setAlternateName($row['alternate_name'] ?? null);
        $c->setParentId(isset($row['parent_id']) && $row['parent_id'] ? (int)$row['parent_id'] : null);
        $c->setDescription($row['description'] ?? null);
        $c->setShortDescription($row['short_description'] ?? null);
        $c->setLink($row['link'] ?? null);
        $c->setStatus($row['status'] ?? 'published');
        $c->setProjectList($row['project_list'] ?? null);
        $c->setProjectListByArea($row['project_list_by_area'] ?? null);
        $c->setSorting((int)($row['sorting'] ?? 0));
        $c->setIsHighlight((int)($row['is_highlight'] ?? 0));
        $c->setMenuPosition(isset($row['menu_position']) ? (int)$row['menu_position'] : null);
        $c->setMetaTitle($row['meta_title'] ?? null);
        $c->setMetaDescription($row['meta_description'] ?? null);
        $c->setIsParallel((int)($row['is_parallel'] ?? 0));
        return $c;
    }
}
