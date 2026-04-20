<?php
class Point7_CMS_Attachment
{
    private int     $id                  = 0;
    private string  $ownerUid            = '';
    private string  $filename            = '';
    private string  $path                = '';
    private string  $profileName         = '';
    private ?string $title               = null;
    private ?string $description         = null;
    private ?string $props               = null;
    private array   $childAttachments    = [];
    private ?string $parentRelationship  = null;
    private int     $sortOrder           = 0;
    private ?string $link                = null;

    public function getId(): int                  { return $this->id; }
    public function setId(int $v): void           { $this->id = $v; }

    public function getOwnerUid(): string         { return $this->ownerUid; }
    public function setOwnerUid(string $v): void  { $this->ownerUid = $v; }

    public function getFilename(): string         { return $this->filename; }
    public function setFilename(string $v): void  { $this->filename = $v; }

    public function getPath(): string             { return $this->path; }
    public function setPath(string $v): void      { $this->path = $v; }

    public function getProfileName(): string         { return $this->profileName; }
    public function setProfileName(string $v): void  { $this->profileName = $v; }

    public function getTitle(): ?string           { return $this->title; }
    public function setTitle(?string $v): void    { $this->title = $v; }

    public function getDescription(): ?string        { return $this->description; }
    public function setDescription(?string $v): void { $this->description = $v; }

    public function getProps(): ?string           { return $this->props; }
    public function setProps(?string $v): void    { $this->props = $v; }

    public function getProperty(string $key): mixed
    {
        $data = $this->props ? json_decode($this->props, true) : [];
        return $data[$key] ?? null;
    }

    public function setProperty(string $key, mixed $value): void
    {
        $data = $this->props ? json_decode($this->props, true) : [];
        $data[$key] = $value;
        $this->props = json_encode($data);
    }

    public function getChildAttachments(): array         { return $this->childAttachments; }
    public function setChildAttachments(array $v): void  { $this->childAttachments = $v; }

    public function getParentRelationship(): ?string        { return $this->parentRelationship; }
    public function setParentRelationship(?string $v): void { $this->parentRelationship = $v; }

    public function getSortOrder(): int           { return $this->sortOrder; }
    public function setSortOrder(int $v): void    { $this->sortOrder = $v; }

    public function getLink(): ?string            { return $this->link; }
    public function setLink(?string $v): void     { $this->link = $v; }

    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'owner_uid'   => $this->ownerUid,
            'filename'    => $this->filename,
            'path'        => $this->path,
            'profile'     => $this->profileName,
            'title'       => $this->title,
            'description' => $this->description,
            'props'       => $this->props,
        ];
    }
}
