<?php
namespace StudioAtrium\Entity\Project;

class Category
{
    const TREE_HOUSE  = 'house';
    const TREE_OTHER  = 'other';

    private int $id = 0;
    private string $tree = 'house';
    private string $name = '';
    private ?string $alternateName = null;
    private ?int $parentId = null;
    private ?string $description = null;
    private ?string $shortDescription = null;
    private ?string $link = null;
    private string $status = 'published';
    private ?string $projectList = null;
    private ?string $projectListByArea = null;
    private int $sorting = 0;
    private int $isHighlight = 0;
    private ?int $menuPosition = null;
    private ?string $metaTitle = null;
    private ?string $metaDescription = null;
    private int $isParallel = 0;
    private array $children = [];

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getTree(): string { return $this->tree; }
    public function setTree(string $v): void { $this->tree = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v): void { $this->name = $v; }
    public function getAlternateName(): ?string { return $this->alternateName; }
    public function setAlternateName(?string $v): void { $this->alternateName = $v; }
    public function getParentId(): ?int { return $this->parentId; }
    public function setParentId(?int $v): void { $this->parentId = $v; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $v): void { $this->description = $v; }
    public function getShortDescription(): ?string { return $this->shortDescription; }
    public function setShortDescription(?string $v): void { $this->shortDescription = $v; }
    public function getLink(): ?string { return $this->link; }
    public function setLink(?string $v): void { $this->link = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v): void { $this->status = $v; }
    public function getProjectList(): ?string { return $this->projectList; }
    public function setProjectList(?string $v): void { $this->projectList = $v; }
    public function getProjectListByArea(): ?string { return $this->projectListByArea; }
    public function setProjectListByArea(?string $v): void { $this->projectListByArea = $v; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $v): void { $this->sorting = $v; }
    public function getIsHighlight(): int { return $this->isHighlight; }
    public function setIsHighlight(int $v): void { $this->isHighlight = $v; }
    public function getMenuPosition(): ?int { return $this->menuPosition; }
    public function setMenuPosition(?int $v): void { $this->menuPosition = $v; }
    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $v): void { $this->metaTitle = $v; }
    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $v): void { $this->metaDescription = $v; }
    public function getIsParallel(): int { return $this->isParallel; }
    public function setIsParallel(int $v): void { $this->isParallel = $v; }
    public function getChildren(): array { return $this->children; }
    public function setChildren(array $v): void { $this->children = $v; }

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
