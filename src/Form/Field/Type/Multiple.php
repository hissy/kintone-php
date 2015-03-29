<?php
namespace Kintone\Form\Field\Type;

use Kintone\Form\Field\FieldType;
use Kintone\Form\Field\Type\Single;

class Multiple extends FieldType implements \Iterator
{
    private $code;
    private $type;
    private $fields = array();
    
    public function populateFromArray(array $array = [])
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
    
    private function addSubFieldFromArray(array $array = [])
    {
        $sub = new Single();
        $sub->populateFromArray($array);
        $this->fields[] = $sub;
    }
    
    public function getSubFields()
    {
        return $this->fields;
    }
    
    public function setFieldCode($code)
    {
        $this->code = $code;
    }
    
    public function setFieldType($type)
    {
        $this->type = $type;
    }
    
    public function getFieldCode()
    {
        return $this->code;
    }
    
    public function getFieldType()
    {
        return $this->type;
    }
    
    public function isMultiple()
    {
        return true;
    }
    
    public function current()
    {
        return current($this->fields);
    }
    
    public function key()
    {
        return key($this->fields);
    }
    
    public function next()
    {
        next($this->fields);
    }
    
    public function rewind()
    {
        reset($this->fields);
    }
    
    public function valid()
    {
        return $this->current() !== false;
    }
}
