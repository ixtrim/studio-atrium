<?php
namespace StudioAtrium\Entity\Project;

class Category
{
    const TREE_HOUSE  = 'house';
    const TREE_OTHER  = 'other';

    private $id = 0;
    private $tree = 'house';
    private $name = '';
    private $alternateName = null;
    private $parentId = null;
    private $description = null;
    private $shortDescription = null;
    private $link = null;
    private $status = 'published';
    private $projectList = null;
    private $projectListByArea = null;
    private $sorting = 0;
    private $isHighlight = 0;
    private $menuPosition = null;
    private $metaTitle = null;
    private $metaDescription = null;
    private $isParallel = 0;
    private $children = [];
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getTree(): string { return $this->tree; }
    public function setTree(string $v) { $this->tree = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v) { $this->name = $v; }
    public function getAlternateName() { return $this->alternateName; }
    public function setAlternateName($v) { $this->alternateName = $v; }
    public function getParentId() { return $this->parentId; }
    public function setParentId($v) { $this->parentId = $v; }
    public function getDescription() { return $this->description; }
    public function setDescription($v) { $this->description = $v; }
    public function getShortDescription() { return $this->shortDescription; }
    public function setShortDescription($v) { $this->shortDescription = $v; }
    public function getLink() { return $this->link; }
    public function setLink($v) { $this->link = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v) { $this->status = $v; }
    public function getProjectList() { return $this->projectList; }
    public function setProjectList($v) { $this->projectList = $v; }
    public function getProjectListByArea() { return $this->projectListByArea; }
    public function setProjectListByArea($v) { $this->projectListByArea = $v; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $v) { $this->sorting = $v; }
    public function getIsHighlight(): int { return $this->isHighlight; }
    public function setIsHighlight(int $v) { $this->isHighlight = $v; }
    public function getMenuPosition() { return $this->menuPosition; }
    public function setMenuPosition($v) { $this->menuPosition = $v; }
    public function getMetaTitle() { return $this->metaTitle; }
    public function setMetaTitle($v) { $this->metaTitle = $v; }
    public function getMetaDescription() { return $this->metaDescription; }
    public function setMetaDescription($v) { $this->metaDescription = $v; }
    public function getIsParallel(): int { return $this->isParallel; }
    public function setIsParallel(int $v) { $this->isParallel = $v; }
    public function getChildren(): array { return $this->children; }
    public function setChildren(array $v) { $this->children = $v; }

    public function toArray(): array
    {
        return [
            'id'                   => $this->id,
            'tree'                 => $this->tree,
            'name'                 => $this->name,
            'alternate_name'       => $this->alternateName,
            'parent_id'            => $this->parentId,
            'description'          => $this->description,
            'short_description'    => $this->shortDescription,
            'link'                 => $this->link,
            'status'               => $this->status,
            'project_list'         => $this->projectList,
            'project_list_by_area' => $this->projectListByArea,
            'sorting'              => $this->sorting,
            'is_highlight'         => $this->isHighlight,
            'menu_position'        => $this->menuPosition,
            'meta_title'           => $this->metaTitle,
            'meta_description'     => $this->metaDescription,
            'is_parallel'          => $this->isParallel,
            'children'             => $this->children,
        ];
    }
}
