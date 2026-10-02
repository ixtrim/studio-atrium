<?php
namespace StudioAtrium\Entity\Discuss;

class Post implements \ArrayAccess
{
    private $id = 0;
    private $parentId = 0;
    private $catId = 0;
    private $authorId = 0;
    private $projectId = 0;
    private $nick = '';
    private $topic = '';
    private $content = '';
    private $createDate = '';
    private $modifyDate = '';
    private $status = 'published';
    private $isModerated = 0;

    /** @var array|null */
    public $user = null;
    /** @var array|null */
    public $attachments = null;
    /** @var array|null */
    public $parent = null;
    /** @var array|null */
    public $project = null;
    /** @var mixed */
    public $_uid = null;

    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getParentId() { return $this->parentId; }
    public function setParentId($v) { $this->parentId = $v === null ? 0 : (int) $v; }
    public function getCatId() { return $this->catId; }
    public function setCatId($v) { $this->catId = $v === null ? 0 : (int) $v; }
    public function getAuthorId() { return $this->authorId; }
    public function setAuthorId($v) { $this->authorId = $v === null ? 0 : (int) $v; }
    public function getProjectId() { return $this->projectId; }
    public function setProjectId($v) { $this->projectId = $v === null ? 0 : (int) $v; }
    public function getNick(): string { return $this->nick; }
    public function setNick(string $v) { $this->nick = $v; }
    public function getTopic(): string { return $this->topic; }
    public function setTopic(string $v) { $this->topic = $v; }
    public function getContent(): string { return $this->content; }
    public function setContent(string $v) { $this->content = $v; }
    public function getCreateDate(): string { return $this->createDate; }
    public function setCreateDate(string $v) { $this->createDate = $v; }
    public function getModifyDate(): string { return $this->modifyDate; }
    public function setModifyDate(string $v) { $this->modifyDate = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v) { $this->status = $v; }
    public function getIsModerated(): int { return (int) $this->isModerated; }
    public function setIsModerated($v) { $this->isModerated = (int) $v; }

    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'parent_id'     => $this->parentId,
            'cat_id'        => $this->catId,
            'author_id'     => $this->authorId,
            'project_id'    => $this->projectId,
            'nick'          => $this->nick,
            'topic'         => $this->topic,
            'content'       => $this->content,
            'create_date'   => $this->createDate,
            'modify_date'   => $this->modifyDate,
            'status'        => $this->status,
            'is_moderated'  => $this->isModerated,
            'user'          => $this->user,
            'attachments'   => $this->attachments,
            'parent'        => $this->parent,
            'project'       => $this->project,
            '_uid'          => $this->_uid,
        ];
    }

    public function offsetExists($offset): bool
    {
        $arr = $this->toArray();
        return array_key_exists($offset, $arr);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        $arr = $this->toArray();
        return $arr[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        // read-mostly for Smarty templates
    }

    public function offsetUnset($offset): void
    {
    }
}
