<?php
namespace StudioAtrium\Entity;

class Carousel implements \ArrayAccess
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getId(): int           { return (int)($this->data['id'] ?? 0); }
    public function getName(): string      { return $this->data['name'] ?? ''; }
    public function getText1()    { return $this->data['text1'] ?? null; }
    public function getText2()    { return $this->data['text2'] ?? null; }
    public function getText3()    { return $this->data['text3'] ?? null; }
    public function getLink()     { return $this->data['link'] ?? null; }
    public function getStatus(): string    { return $this->data['status'] ?? ''; }

    public function getExtraData(bool $asArray = false)
    {
        $val = $this->data['extra_data'] ?? [];
        if ($asArray) return is_array($val) ? $val : [];
        return $val;
    }

    public function getAttachments(): array { return $this->data['attachments'] ?? []; }

    public function toArray(): array { return $this->data; }

    // ArrayAccess — so Smarty templates can still do $_item['attachments'] etc.
    public function offsetExists($offset): bool  { return isset($this->data[$offset]); }
    public function offsetGet($offset)    { return $this->data[$offset] ?? null; }
    public function offsetSet($offset, $v) { if ($offset === null) $this->data[] = $v; else $this->data[$offset] = $v; }
    public function offsetUnset($offset)   { unset($this->data[$offset]); }
}
