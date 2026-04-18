<?php
namespace StudioAtrium\Entity\Discuss;

class Post
{
    private int $id = 0;
    private ?int $parentId = null;
    private ?int $catId = null;
    private ?int $authorId = null;
    private ?int $projectId = null;
    private string $nick = '';
    private string $topic = '';
    private string $content = '';
    private string $createDate = '';
    private string $status = 'published';

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getParentId(): ?int { return $this->parentId; }
    public function setParentId(?int $v): void { $this->parentId = $v; }
    public function getCatId(): ?int { return $this->catId; }
    public function setCatId(?int $v): void { $this->catId = $v; }
    public function getAuthorId(): ?int { return $this->authorId; }
    public function setAuthorId(?int $v): void { $this->authorId = $v; }
    public function getProjectId(): ?int { return $this->projectId; }
    public function setProjectId(?int $v): void { $this->projectId = $v; }
    public function getNick(): string { return $this->nick; }
    public function setNick(string $v): void { $this->nick = $v; }
    public function getTopic(): string { return $this->topic; }
    public function setTopic(string $v): void { $this->topic = $v; }
    public function getContent(): string { return $this->content; }
    public function setContent(string $v): void { $this->content = $v; }
    public function getCreateDate(): string { return $this->createDate; }
    public function setCreateDate(string $v): void { $this->createDate = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v): void { $this->status = $v; }

    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'parent_id'   => $this->parentId,
            'cat_id'      => $this->catId,
            'author_id'   => $this->authorId,
            'project_id'  => $this->projectId,
            'nick'        => $this->nick,
            'topic'       => $this->topic,
            'content'     => $this->content,
            'create_date' => $this->createDate,
            'status'      => $this->status,
        ];
    }
}
