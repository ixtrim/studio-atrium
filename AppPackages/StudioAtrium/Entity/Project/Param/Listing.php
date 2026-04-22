<?php
namespace StudioAtrium\Entity\Project\Param;

class Listing implements \ArrayAccess
{
    public $params = array();
    private $id;
    private $name;
    private $alternateName;

    public function __construct(array $row)
    {
        $this->id = (int) $row['id'];
        $this->name = isset($row['name']) ? $row['name'] : '';
        $this->alternateName = isset($row['alternate_name']) ? $row['alternate_name'] : null;

        $decoded = json_decode($row['params'], true);
        $this->params = is_array($decoded) ? $decoded : array();
    }

    /**
     * @param bool $asIntKeys When true, cast param ids to integers (compare lists).
     * @return array
     */
    public function getParams($asIntKeys = false)
    {
        if (!$asIntKeys) {
            return $this->params;
        }

        $result = array();
        foreach ($this->params as $paramId) {
            $result[] = (int) $paramId;
        }
        return $result;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAlternateName()
    {
        return $this->alternateName;
    }

    public function toArray()
    {
        return array(
            'id'             => $this->id,
            'name'           => $this->name,
            'alternate_name' => $this->alternateName,
            'params'         => $this->params,
        );
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->toArray());
    }

    public function offsetGet($offset)
    {
        $data = $this->toArray();
        return array_key_exists($offset, $data) ? $data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if ($offset === 'params') {
            $this->params = is_array($value) ? $value : array();
        }
    }

    public function offsetUnset($offset)
    {
    }
}
