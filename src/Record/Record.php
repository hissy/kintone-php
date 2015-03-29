<?php
namespace Kintone\Record;

use Kintone\Object;

class Record extends Object
{
    protected $command = 'record';
    
    public function getByID($appID, $id)
    {
        return $this->get(['app' => $appID, 'id' => $id]);
    }
    
    public function postRecord($appID, $record)
    {
        return $this->post(['app' => $appID, 'record' => $record]);
    }
}