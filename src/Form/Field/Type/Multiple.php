<?php

namespace Kintone\Form\Field\Type;

use Kintone\Form\Field\FieldType;

class Multiple extends FieldType implements \Iterator
{
    private string $code;
    private string $type;
    private array $fields = [];

    public function populateFromArray(array $array = []): void
    {
        if (isset($array['code'])) {
            $this->setFieldCode($array['code']);
        }
        if (isset($array['type'])) {
            $this->setFieldType($array['type']);
        }
        if (isset($array['fields']) && is_array($array['fields'])) {
            foreach ($array['fields'] as $field) {
                $this->addSubFieldFromArray($field);
            }
        }
    }

    private function addSubFieldFromArray(array $array = []): void
    {
        $sub = new Single();
        $sub->populateFromArray($array);
        $this->fields[] = $sub;
    }

    public function getSubFields(): array
    {
        return $this->fields;
    }

    public function setFieldCode(string $code): void
    {
        $this->code = $code;
    }

    public function setFieldType(string $type): void
    {
        $this->type = $type;
    }

    public function getFieldCode(): string
    {
        return $this->code;
    }

    public function getFieldType(): string
    {
        return $this->type;
    }

    public function isMultiple(): bool
    {
        return true;
    }

    public function current(): mixed
    {
        return current($this->fields);
    }

    public function key(): mixed
    {
        return key($this->fields);
    }

    public function next(): void
    {
        next($this->fields);
    }

    public function rewind(): void
    {
        reset($this->fields);
    }

    public function valid(): bool
    {
        return $this->current() !== false;
    }
}
