<?php
namespace Kintone\App;

use Kintone\Object;

class App extends Object
{
    protected $command = 'app';
    
    public function getByID($id)
    {
        return $this->get(['id' => $id]);
    }
}