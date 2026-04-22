<?php
namespace StudioAtrium\Entity\Project\ToParam;

class Value
{
    private $data;

    public function __construct(array $row)
    {
        $this->data = array(
            'id'               => (int) $row['id'],
            'project_id'       => (int) $row['project_id'],
            'project_param_id' => (int) $row['project_param_id'],
            'string_value'     => isset($row['string_value']) ? $row['string_value'] : null,
            'num_value'        => isset($row['num_value']) ? $row['num_value'] : null,
        );
    }

    public function getStringValue()
    {
        return $this->data['string_value'];
    }

    public function getNumValue()
    {
        return $this->data['num_value'];
    }

    public function toArray()
    {
        return $this->data;
    }
}
