<?php
namespace Kintone\Form\Field\Type;

use Kintone\Form\Field\FieldType;

class Single extends FieldType
{
    public function populateFromArray(array $array = [])
    {
        $this->setProperties($array);
    }

    public function setProperties(array $array = [])
    {
        $this->properties = $array;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getLabel()
    {
        if (isset($this->properties['label'])) {
            return $this->properties['label'];
        }
    }

    public function getFieldCode()
    {
        if (isset($this->properties['code'])) {
            return $this->properties['code'];
        }
    }

    public function getElementID()
    {
        if (isset($this->properties['elementId'])) {
            return $this->properties['elementId'];
        }
    }

    public function getFieldType()
    {
        if (isset($this->properties['type'])) {
            return $this->properties['type'];
        }
    }

    public function noLabel()
    {
        if (isset($this->properties['noLabel'])) {
            return ($this->properties['noLabel'] == 'true') ? true : false;
        }
    }

    public function isRequired()
    {
        if (isset($this->properties['required'])) {
            return ($this->properties['required'] == 'true') ? true : false;
        }
    }

    public function isUnique()
    {
        if (isset($this->properties['unique'])) {
            return ($this->properties['unique'] == 'true') ? true : false;
        }
        return false;
    }

    public function getMaxValue()
    {
        if (isset($this->properties['maxValue'])) {
            return $this->properties['maxValue'];
        }
    }

    public function getMinValue()
    {
        if (isset($this->properties['minValue'])) {
            return $this->properties['minValue'];
        }
    }

    public function getMaxLength()
    {
        if (isset($this->properties['maxLength'])) {
            return $this->properties['maxLength'];
        }
    }

    public function getMinLength()
    {
        if (isset($this->properties['minLength'])) {
            return $this->properties['minLength'];
        }
    }

    public function getDefaultValue()
    {
        if (isset($this->properties['defaultValue'])) {
            return $this->properties['defaultValue'];
        }
    }

    public function getDefaultExpression()
    {
        if (isset($this->properties['defaultExpression'])) {
            return $this->properties['defaultExpression'];
        }
    }

    public function getOptions()
    {
        if (isset($this->properties['options'])) {
            return $this->properties['options'];
        }
    }

    public function getFormat()
    {
        if (isset($this->properties['format'])) {
            return $this->properties['format'];
        }
    }

    public function getUnit()
    {
        if (isset($this->properties['unit'])) {
            return $this->properties['unit'];
        }
    }

    public function getUnitPosition()
    {
        if (isset($this->properties['unitPosition'])) {
            return $this->properties['unitPosition'];
        }
    }

    public function getProtocol()
    {
        if (isset($this->properties['protocol'])) {
            return $this->properties['protocol'];
        }
    }

    public function isMultiple()
    {
        return false;
    }
}
