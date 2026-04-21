<?php
namespace StudioAtrium\Entity;

class EntityCollection implements \Iterator, \Countable, \ArrayAccess
{
    private array $items;
    private int $pos = 0;

    public function __construct(array $items = [])
    {
        $this->items = array_values($items);
    }

    public function current(): mixed { return $this->items[$this->pos] ?? null; }
    public function key(): int { return $this->pos; }
    public function next(): void { ++$this->pos; }
    public function rewind(): void { $this->pos = 0; }
    public function valid(): bool { return isset($this->items[$this->pos]); }
    public function count(): int { return count($this->items); }

    public function offsetExists(mixed $offset): bool  { return isset($this->items[$offset]); }
    public function offsetGet(mixed $offset): mixed    { return $this->items[$offset] ?? null; }
    public function offsetSet(mixed $offset, mixed $v): void { if ($offset === null) $this->items[] = $v; else $this->items[$offset] = $v; }
    public function offsetUnset(mixed $offset): void   { unset($this->items[$offset]); $this->items = array_values($this->items); }

    public function toArray(string $_ = '', string $keyField = ''): array
    {
        $result = [];
        foreach ($this->items as $item) {
            $arr = is_array($item) ? $item : $item->toArray();
            if ($keyField !== '') {
                $result[$arr[$keyField]] = $arr;
            } else {
                $result[] = $arr;
            }
        }
        return $result;
    }
}
