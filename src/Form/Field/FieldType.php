<?php
namespace Kintone\Form\Field;

abstract class FieldType
{
    protected $properties = array();
    
    abstract public function populateFromArray(array $array = []);
    
    abstract public function getFieldCode();
    
    abstract public function getFieldType();
    
    abstract public function isMultiple();
}