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

    private int $id = 0;
    private string $title = '';
    private ?string $teaser = null;
    private ?string $content = null;
    private string $status = 'published';
    private string $doctype = 'article';
    private ?string $charId = null;
    private ?string $keywords = null;
    private ?string $publishDate = null;
    private ?string $metaTitle = null;
    private ?string $metaDescription = null;
    private ?string $extraData = null;
    private int $notListing = 0;
    private array $attachments = [];

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getTitle(): string { return $this->title; }
    public function setTitle(string $v): void { $this->title = $v; }
    public function getTeaser(): ?string { return $this->teaser; }
    public function setTeaser(?string $v): void { $this->teaser = $v; }
    public function getContent(): ?string { return $this->content; }
    public function setContent(?string $v): void { $this->content = $v; }
    public function getStatus(): string { return $this->status; }
    public function setStatus(string $v): void { $this->status = $v; }
    public function getDoctype(): string { return $this->doctype; }
    public function setDoctype(string $v): void { $this->doctype = $v; }
    public function getCharId(): ?string { return $this->charId; }
    public function setCharId(?string $v): void { $this->charId = $v; }
    public function getKeywords(): ?string { return $this->keywords; }
    public function setKeywords(?string $v): void { $this->keywords = $v; }
    public function getPublishDate(): ?string { return $this->publishDate; }
    public function setPublishDate(?string $v): void { $this->publishDate = $v; }
    public function getMetaTitle(): ?string { return $this->metaTitle; }
    public function setMetaTitle(?string $v): void { $this->metaTitle = $v; }
    public function getMetaDescription(): ?string { return $this->metaDescription; }
    public function setMetaDescription(?string $v): void { $this->metaDescription = $v; }
    public function getExtraData(): ?string { return $this->extraData; }
    public function setExtraData(?string $v): void { $this->extraData = $v; }
    public function getNotListing(): int { return $this->notListing; }
    public function setNotListing(int $v): void { $this->notListing = $v; }
    public function setAttachments(array $v): void { $this->attachments = $v; }
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
