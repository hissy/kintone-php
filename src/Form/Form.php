<?php
namespace Kintone\Form;

use Kintone\Object;

class Form extends Object
{
    protected $command = 'form';
    
    public function getByID($app)
    {
        return $this->get(['app' => $app]);
    }
}