<?php

namespace Kintone\Form\Field;

use Kintone\Form\Field\Type\Single;
use Kintone\Form\Field\Type\Multiple;

class FieldList implements \Iterator
{
    private array $properties;

    public function __construct(array $properties = [])
    {
        $this->properties = array_map([$this,'mapField'], $properties);
    }

    public function mapField(array $array = []): FieldType
    {
        if (isset($array['type']) && $array['type'] === 'SUBTABLE') {
            $type = new Multiple();
        } else {
            $type = new Single();
        }
        $type->populateFromArray($array);
        return $type;
    }

    public function current(): mixed
    {
        return current($this->properties);
    }

    public function key(): mixed
    {
        return key($this->properties);
    }

    public function next(): void
    {
        next($this->properties);
    }

    public function rewind(): void
    {
        reset($this->properties);
    }

    public function valid(): bool
    {
        return $this->current() !== false;
    }
}
