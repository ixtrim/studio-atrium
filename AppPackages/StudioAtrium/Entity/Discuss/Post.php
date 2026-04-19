<?php
namespace StudioAtrium\Entity\Discuss;

class Post
{
    private $id = 0;
    private $parentId = null;
    private $catId = null;
    private $authorId = null;
    private $projectId = null;
    private $nick = '';
    private $topic = '';
    private $content = '';
    private $createDate = '';
    private $status = 'published';
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getParentId() { return $this->parentId; }
    public function setParentId($v) { $this->parentId = $v; }
    public function getCatId() { return $this->catId; }
    public function setCatId($v) { $this->catId = $v; }
    public function getAuthorId() { return $this->authorId; }
    public function setAuthorId($v) { $this->authorId = $v; }
    public function getProjectId() { return $this->projectId; }
    public function setProjectId($v) { $this->projectId = $v; }
    public function getNick(): string { return $this->nick; }
    public function setNick(string $v) { $this->nick = $v; }
    public function getTopic(): string { return $this->topic; }
    public function setTopic(string $v) { $this->topic = $v; }
    public function getContent(): string { return $this->content; }
    public function setContent(string $v) { $this->content = $v; }
    public function getCreateDate(): string { return $this->createDate; }
    public function setCreateDate(string $v) { $this->createDate = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v) { $this->status = $v; }

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
