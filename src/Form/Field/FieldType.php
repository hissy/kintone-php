<?php

namespace Kintone\Form\Field;

abstract class FieldType
{
    protected array $properties = [];

    abstract public function populateFromArray(array $array = []);

    abstract public function getFieldCode();

    abstract public function getFieldType();

    abstract public function isMultiple();
}
