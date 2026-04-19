<?php
namespace StudioAtrium\Entity;

class Document
{
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT     = 'draft';
    const STATUS_HIDDEN    = 'hidden';
    const DOCTYPE_PAGE     = 'page';
    const DOCTYPE_ARTICLE  = 'article';
    const DOCTYPE_NEWS     = 'news';
    const DOCTYPE_PARTNER  = 'partner';

    private $id = 0;
    private $title = '';
    private $teaser = null;
    private $content = null;
    private $status = 'published';
    private $doctype = 'article';
    private $charId = null;
    private $keywords = null;
    private $publishDate = null;
    private $metaTitle = null;
    private $metaDescription = null;
    private $extraData = null;
    private $notListing = 0;
    private $attachments = [];
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getTitle(): string { return $this->title; }
    public function setTitle(string $v) { $this->title = $v; }
    public function getTeaser() { return $this->teaser; }
    public function setTeaser($v) { $this->teaser = $v; }
    public function getContent() { return $this->content; }
    public function setContent($v) { $this->content = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v) { $this->status = $v; }
    public function getDoctype(): string { return $this->doctype; }
    public function setDoctype(string $v) { $this->doctype = $v; }
    public function getCharId() { return $this->charId; }
    public function setCharId($v) { $this->charId = $v; }
    public function getKeywords() { return $this->keywords; }
    public function setKeywords($v) { $this->keywords = $v; }
    public function getPublishDate() { return $this->publishDate; }
    public function setPublishDate($v) { $this->publishDate = $v; }
    public function getMetaTitle() { return $this->metaTitle; }
    public function setMetaTitle($v) { $this->metaTitle = $v; }
    public function getMetaDescription() { return $this->metaDescription; }
    public function setMetaDescription($v) { $this->metaDescription = $v; }
    public function getExtraData() { return $this->extraData; }
    public function setExtraData($v) { $this->extraData = $v; }
    public function getNotListing(): int { return $this->notListing; }
    public function setNotListing(int $v) { $this->notListing = $v; }
    public function setAttachments(array $v) { $this->attachments = $v; }
    public function getAttachments(): array { return $this->attachments; }

    public function toArray(): array
    {
        return [
            'id'               => $this->id,
            'title'            => $this->title,
            'teaser'           => $this->teaser,
            'content'          => $this->content,
            'status'           => $this->status,
            'doctype'          => $this->doctype,
            'char_id'          => $this->charId,
            'keywords'         => $this->keywords,
            'publish_date'     => $this->publishDate,
            'meta_title'       => $this->metaTitle,
            'meta_description' => $this->metaDescription,
            'extra_data'       => $this->extraData,
            'not_listing'      => $this->notListing,
            'attachments'      => $this->attachments,
        ];
    }
}
