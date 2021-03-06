<?php
namespace Kintone\Form\Field;

use Kintone\Form\Field\Type\Single;
use Kintone\Form\Field\Type\Multiple;

class FieldList implements \Iterator
{
    private $properties = [];
    
    public function __construct(array $properties = [])
    {
        $this->properties = array_map(array($this,'mapField'),$properties);
    }
    
    public function mapField(array $array = [])
    {
        if (isset($array['type']) && $array['type'] == 'SUBTABLE') {
            $type = new Multiple();
        } else {
            $type = new Single();
        }
        $type->populateFromArray($array);
        return $type;
    }
    
    public function current()
    {
        return current($this->properties);
    }
    
    public function key()
    {
        return key($this->properties);
    }
    
    public function next()
    {
        next($this->properties);
    }
    
    public function rewind()
    {
        reset($this->properties);
    }
    
    public function valid()
    {
        return $this->current() !== false;
    }
}
