<?php
namespace StudioAtrium\Entity;

class RenderAuthorize
{
    const STATUS_PUBLISHED = 'published';
    const STATUS_DRAFT     = 'draft';

    private $id = 0;
    private $projectId = 0;
    private $renderId = 0;
    private $authorization = null;
    private $props = null;
    private $status = self::STATUS_DRAFT;

    public function getId() { return $this->id; }
    public function setId($v) { $this->id = (int)$v; }

    public function getProjectId() { return $this->projectId; }
    public function setProjectId($v) { $this->projectId = (int)$v; }

    public function getRenderId() { return $this->renderId; }
    public function setRenderId($v) { $this->renderId = (int)$v; }

    public function getProps() { return $this->props; }
    public function setProps($v) { $this->props = $v; }

    public function getStatus() { return $this->status; }
    public function setStatus($v) { $this->status = $v; }

    public function setAuthorization($authorization) { $this->authorization = $authorization; }

    public function getAuthorization($asArray = false)
    {
        if (!$asArray) {
            return $this->authorization;
        }
        if (is_array($this->authorization)) {
            return $this->authorization;
        }
        if (is_string($this->authorization) && $this->authorization !== '') {
            $decoded = json_decode($this->authorization, true);
            return is_array($decoded) ? $decoded : [];
        }
        return [];
    }

    public function toArray()
    {
        return [
            'id'            => $this->id,
            'project_id'    => $this->projectId,
            'render_id'     => $this->renderId,
            'authorization' => $this->getAuthorization(true),
            'props'         => $this->props,
            'status'        => $this->status,
        ];
    }
}
