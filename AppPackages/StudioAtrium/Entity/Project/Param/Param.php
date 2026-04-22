<?php
namespace StudioAtrium\Entity\Project\Param;

class Param
{
    private $data;

    public function __construct(array $row, array $options = array())
    {
        $this->data = array(
            'id'          => (int) $row['id'],
            'name'        => isset($row['name']) ? $row['name'] : '',
            'char_id'     => isset($row['char_id']) ? $row['char_id'] : '',
            'unit'        => isset($row['unit']) ? $row['unit'] : '',
            'value_type'  => isset($row['value_type']) ? $row['value_type'] : 'string',
            'type'        => isset($row['type']) ? $row['type'] : 'value',
            'project_type'=> isset($row['project_type']) ? $row['project_type'] : 'house',
            'description' => isset($row['description']) ? $row['description'] : null,
            'options'     => $options,
        );
    }

    public function getDescription()
    {
        return $this->data['description'];
    }

    public function toArray()
    {
        return $this->data;
    }
}
