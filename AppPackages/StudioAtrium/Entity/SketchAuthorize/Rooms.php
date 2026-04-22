<?php
namespace StudioAtrium\Entity\SketchAuthorize;

class Rooms
{
    private $id = 0;
    private $sketchAuthorizeId = 0;
    private $sketchParamId = 0;
    private $projectToSketchParamId = 0;
    private $description = '';
    private $link = '';
    private $points = [];
    private $props = null;

    public function getId() { return $this->id; }
    public function setId($v) { $this->id = (int)$v; }

    public function getSketchAuthorizeId() { return $this->sketchAuthorizeId; }
    public function setSketchAuthorizeId($v) { $this->sketchAuthorizeId = (int)$v; }

    public function getSketchParamId() { return $this->sketchParamId; }
    public function setSketchParamId($v) { $this->sketchParamId = (int)$v; }

    public function getProjectToSketchParamId() { return $this->projectToSketchParamId; }
    public function setProjectToSketchParamId($v) { $this->projectToSketchParamId = (int)$v; }

    public function getDescription() { return $this->description; }
    public function setDescription($v) { $this->description = (string)$v; }

    public function getLink() { return $this->link; }
    public function setLink($v) { $this->link = (string)$v; }

    public function getProps() { return $this->props; }
    public function setProps($v) { $this->props = $v; }

    public function setPoints($points) { $this->points = $points; }

    public function getPoints($asArray = false)
    {
        if (!$asArray) {
            return is_string($this->points) ? $this->points : json_encode($this->points);
        }
        if (is_array($this->points)) {
            return $this->points;
        }
        if (is_string($this->points) && $this->points !== '') {
            $decoded = json_decode($this->points, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }

    public function toArray()
    {
        return [
            'id'                          => $this->id,
            'sketch_authorize_id'         => $this->sketchAuthorizeId,
            'sketch_param_id'             => $this->sketchParamId,
            'project_to_sketch_param_id'    => $this->projectToSketchParamId,
            'description'                 => $this->description,
            'link'                        => $this->link,
            'points'                      => $this->getPoints(true),
            'props'                       => $this->props,
        ];
    }
}
