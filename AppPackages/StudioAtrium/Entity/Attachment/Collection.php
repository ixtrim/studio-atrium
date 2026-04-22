<?php
namespace StudioAtrium\Entity\Attachment;

class Collection implements \Iterator, \Countable
{
    /** @var \Point7_CMS_Attachment[] */
    private $attachments = [];
    private $pos = 0;

    /**
     * @param \Point7_CMS_Attachment[] $attachments
     */
    public function __construct(array $attachments = [])
    {
        $this->attachments = array_values($attachments);
    }

    public function getAttachmentsByType($type)
    {
        $filtered = [];
        foreach ($this->attachments as $attachment) {
            if ($attachment->getProfileName() === $type) {
                $filtered[] = $attachment;
            }
        }
        return new \StudioAtrium\Entity\EntityCollection($filtered);
    }

    /**
     * Returns self — attachments are already grouped when loaded from DAO.
     */
    public function reorganize()
    {
        return $this;
    }

    /**
     * Group attachments by profile_name for Smarty templates.
     */
    public function toArray()
    {
        $grouped = [];
        foreach ($this->attachments as $attachment) {
            $profile = $attachment->getProfileName();
            if (!isset($grouped[$profile])) {
                $grouped[$profile] = [];
            }
            $grouped[$profile][] = $attachment->toArray();
        }
        return $grouped;
    }

    public function current()
    {
        return $this->attachments[$this->pos] ?? null;
    }

    public function key()
    {
        return $this->pos;
    }

    public function next()
    {
        ++$this->pos;
    }

    public function rewind()
    {
        $this->pos = 0;
    }

    public function valid()
    {
        return isset($this->attachments[$this->pos]);
    }

    public function count()
    {
        return count($this->attachments);
    }
}
