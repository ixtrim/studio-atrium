<?php
namespace StudioAtrium\Entity;

class Settings
{
    private $id = 0;
    private $name = '';
    private $charId = '';
    private $valueType = 'string';
    private $numValue = null;
    private $stringValue = null;
    private $family = null;
    public function getId(): int { return $this->id; }
    public function setId(int $v) { $this->id = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v) { $this->name = $v; }
    public function getCharId(): string { return $this->charId; }
    public function setCharId(string $v) { $this->charId = $v; }
    public function getValueType(): string { return $this->valueType; }
    public function setValueType(string $v) { $this->valueType = $v; }
    public function getNumValue() { return $this->numValue; }
    public function setNumValue($v) { $this->numValue = $v; }
    public function getStringValue() { return $this->stringValue; }
    public function setStringValue($v) { $this->stringValue = $v; }
    public function getFamily() { return $this->family; }
    public function setFamily($v) { $this->family = $v; }

    public function toArray(): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'char_id'      => $this->charId,
            'value_type'   => $this->valueType,
            'num_value'    => $this->numValue,
            'string_value' => $this->stringValue,
            'family'       => $this->family,
        ];
    }
}
