<?php
namespace StudioAtrium\Entity\SketchParam;

class ProjectLink
{
    private $data;

    public function __construct(array $row)
    {
        $this->data = array(
            'id'              => (int) $row['id'],
            'project_id'      => (int) $row['project_id'],
            'sketch_param_id' => (int) $row['sketch_param_id'],
            'sketch_id'       => (int) $row['sketch_id'],
            'room_no'         => isset($row['room_no']) ? $row['room_no'] : null,
            'area'            => isset($row['area']) ? $row['area'] : null,
            'storey'          => isset($row['storey']) ? $row['storey'] : null,
            'sorting'         => isset($row['sorting']) ? (int) $row['sorting'] : 0,
        );
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function getSketchParamId()
    {
        return $this->data['sketch_param_id'];
    }

    public function getProjectToSketchParamId()
    {
        return $this->data['id'];
    }

    public function getSketchId()
    {
        return $this->data['sketch_id'];
    }

    public function toArray()
    {
        return $this->data;
    }
}
