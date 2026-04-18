<?php
namespace StudioAtrium\Entity;

class Settings
{
    private int $id = 0;
    private string $name = '';
    private string $charId = '';
    private string $valueType = 'string';
    private ?float $numValue = null;
    private ?string $stringValue = null;
    private ?string $family = null;

    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }
    public function getName(): string { return $this->name; }
    public function setName(string $v): void { $this->name = $v; }
    public function getCharId(): string { return $this->charId; }
    public function setCharId(string $v): void { $this->charId = $v; }
    public function getValueType(): string { return $this->valueType; }
    public function setValueType(string $v): void { $this->valueType = $v; }
    public function getNumValue(): ?float { return $this->numValue; }
    public function setNumValue(?float $v): void { $this->numValue = $v; }
    public function getStringValue(): ?string { return $this->stringValue; }
    public function setStringValue(?string $v): void { $this->stringValue = $v; }
    public function getFamily(): ?string { return $this->family; }
    public function setFamily(?string $v): void { $this->family = $v; }

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
