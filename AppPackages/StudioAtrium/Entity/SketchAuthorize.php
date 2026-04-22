<?php
namespace StudioAtrium\Entity;

class SketchAuthorize
{
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT     = 'draft';

    private $id = 0;
    private $projectId = 0;
    private $sketchId = 0;
    private $width = 0;
    private $height = 0;
    private $props = null;
    private $status = self::STATUS_DRAFT;
    private $rooms = [];

    public function getId() { return $this->id; }
    public function setId($v) { $this->id = (int)$v; }

    public function getProjectId() { return $this->projectId; }
    public function setProjectId($v) { $this->projectId = (int)$v; }

    public function getSketchId() { return $this->sketchId; }
    public function setSketchId($v) { $this->sketchId = (int)$v; }

    public function getWidth() { return $this->width; }
    public function setWidth($v) { $this->width = (int)$v; }

    public function getHeight() { return $this->height; }
    public function setHeight($v) { $this->height = (int)$v; }

    public function getProps() { return $this->props; }
    public function setProps($v) { $this->props = $v; }

    public function getStatus() { return $this->status; }
    public function setStatus($v) { $this->status = $v; }

    public function setRooms(array $rooms) { $this->rooms = $rooms; }

    public function getRooms()
    {
        return $this->rooms;
    }

    public function toArray()
    {
        return [
            'id'         => $this->id,
            'project_id' => $this->projectId,
            'sketch_id'  => $this->sketchId,
            'width'      => $this->width,
            'height'     => $this->height,
            'props'      => $this->props,
            'status'     => $this->status,
            'rooms'      => array_map(function ($room) {
                return $room instanceof SketchAuthorize\Rooms ? $room->toArray() : $room;
            }, $this->rooms),
        ];
    }
}
