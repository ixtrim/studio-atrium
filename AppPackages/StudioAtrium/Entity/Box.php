<?php
namespace StudioAtrium\Entity;

class Box
{
    const TYPE_LINK     = 'link';
    const TYPE_COMMENTS = 'comments';
    const TYPE_BLOG     = 'blog';
    const TYPE_ARTICLES = 'articles';

    private int $id = 0;
    private string $name = '';
    private ?string $subtitle = null;
    private ?string $link = null;
    private ?string $bgColor = null;
    private ?string $bgColorHover = null;
    private ?string $description = null;
    private int $sorting = 0;
    private string $status = 'published';
    private string $type = 'link';
    private ?int $projectCategoryId = null;
    private array $attachments = [];
    private mixed $content = null;

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v): void { $this->name = $v; }
    public function getSubtitle(): ?string { return $this->subtitle; }
    public function setSubtitle(?string $v): void { $this->subtitle = $v; }
    public function getLink(): ?string { return $this->link; }
    public function setLink(?string $v): void { $this->link = $v; }
    public function getBgColor(): ?string { return $this->bgColor; }
    public function setBgColor(?string $v): void { $this->bgColor = $v; }
    public function getBgColorHover(): ?string { return $this->bgColorHover; }
    public function setBgColorHover(?string $v): void { $this->bgColorHover = $v; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $v): void { $this->description = $v; }
    public function getSorting(): int { return $this->sorting; }
    public function setSorting(int $v): void { $this->sorting = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v): void { $this->status = $v; }
    public function getType(): string { return $this->type; }
    public function setType(string $v): void { $this->type = $v; }
    public function getProjectCategoryId(): ?int { return $this->projectCategoryId; }
    public function setProjectCategoryId(?int $v): void { $this->projectCategoryId = $v; }
    public function setContent(mixed $v): void { $this->content = $v; }
    public function getContent(): mixed { return $this->content; }

    public function setAttachmentObjects(array $attachments): void
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
