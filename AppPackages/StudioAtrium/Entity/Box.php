<?php
namespace StudioAtrium\Entity;

class Box
{
    const TYPE_LINK     = 'link';
    const TYPE_COMMENTS = 'comments';
    const TYPE_BLOG     = 'blog';
    const TYPE_ARTICLES = 'articles';

    private $id = 0;
    private $name = '';
    private $subtitle = null;
    private $link = null;
    private $bgColor = null;
    private $bgColorHover = null;
    private $description = null;
    private $sorting = 0;
    private $status = 'published';
    private $type = 'link';
    private $projectCategoryId = null;
    private $attachments = [];
    private $content = null;
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v) { $this->name = $v; }
    public function getSubtitle() { return $this->subtitle; }
    public function setSubtitle($v) { $this->subtitle = $v; }
    public function getLink() { return $this->link; }
    public function setLink($v) { $this->link = $v; }
    public function getBgColor() { return $this->bgColor; }
    public function setBgColor($v) { $this->bgColor = $v; }
    public function getBgColorHover() { return $this->bgColorHover; }
    public function setBgColorHover($v) { $this->bgColorHover = $v; }
    public function getDescription() { return $this->description; }
    public function setDescription($v) { $this->description = $v; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $v) { $this->sorting = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v) { $this->status = $v; }
    public function getType(): string { return $this->type; }
    public function setType(string $v) { $this->type = $v; }
    public function getProjectCategoryId() { return $this->projectCategoryId; }
    public function setProjectCategoryId($v) { $this->projectCategoryId = $v; }
    public function setContent($v) { $this->content = $v; }
    public function getContent() { return $this->content; }

    public function setAttachmentObjects(array $attachments)
    {
        $this->attachments = $attachments;
    }

    public function getAttachments(): EntityCollection
    {
        return new EntityCollection($this->attachments);
    }

    public function toArray(): array
    {
        // Group attachments by profile_name for template
        $grouped = [];
        foreach ($this->attachments as $att) {
            $profile = $att->getProfileName();
            $grouped[$profile][] = [
                'id'       => $att->getId(),
                'path'     => $att->getPath(),
                'filename' => $att->getFilename(),
                'title'    => $att->getTitle(),
                'props'    => $att->getProps(),
                'sorting'  => $att->getSortOrder(),
            ];
        }

        return [
            'id'                  => $this->id,
            'name'                => $this->name,
            'subtitle'            => $this->subtitle,
            'link'                => $this->link,
            'bg_color'            => $this->bgColor,
            'bg_color_hover'      => $this->bgColorHover,
            'description'         => $this->description,
            'sorting'             => $this->sorting,
            'status'              => $this->status,
            'type'                => $this->type,
            'project_category_id' => $this->projectCategoryId,
            'attachments'         => $grouped,
            'content'             => $this->content,
        ];
    }
}
