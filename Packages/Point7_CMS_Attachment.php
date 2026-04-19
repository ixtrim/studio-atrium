<?php
class Point7_CMS_Attachment
{
    private $id                  = 0;
    private $ownerUid            = '';
    private $filename            = '';
    private $path                = '';
    private $profileName         = '';
    private $title               = null;
    private $description         = null;
    private $props               = null;
    private $childAttachments    = [];
    private $parentRelationship  = null;
    private $sortOrder           = 0;
    private $link                = null;
    public function getId(): int                  { return $this->id; }
    public function setId(int $v)           { $this->id = $v; }

    public function getOwnerUid(): string         { return $this->ownerUid; }
    public function setOwnerUid(string $v)  { $this->ownerUid = $v; }

    public function getFilename(): string         { return $this->filename; }
    public function setFilename(string $v)  { $this->filename = $v; }

    public function getPath(): string             { return $this->path; }
    public function setPath(string $v)      { $this->path = $v; }

    public function getProfileName(): string         { return $this->profileName; }
    public function setProfileName(string $v)  { $this->profileName = $v; }

    public function getTitle()           { return $this->title; }
    public function setTitle($v)    { $this->title = $v; }

    public function getDescription()        { return $this->description; }
    public function setDescription($v) { $this->description = $v; }

    public function getProps()           { return $this->props; }
    public function setProps($v)    { $this->props = $v; }

    public function getProperty(string $key)
    {
        $data = $this->props ? json_decode($this->props, true) : [];
        return $data[$key] ?? null;
    }

    public function setProperty(string $key, $value)
    {
        $data = $this->props ? json_decode($this->props, true) : [];
        $data[$key] = $value;
        $this->props = json_encode($data);
    }

    public function getChildAttachments(): array         { return $this->childAttachments; }
    public function setChildAttachments(array $v)  { $this->childAttachments = $v; }

    public function getParentRelationship()        { return $this->parentRelationship; }
    public function setParentRelationship($v) { $this->parentRelationship = $v; }

    public function getSortOrder(): int           { return $this->sortOrder; }
    public function setSortOrder(int $v)    { $this->sortOrder = $v; }

    public function getLink()            { return $this->link; }
    public function setLink($v)     { $this->link = $v; }

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
