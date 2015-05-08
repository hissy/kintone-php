<?php
namespace Kintone\File;

use Kintone\Object;
use Kintone\Response;
use GuzzleHttp\Post\PostFile;

class File extends Object
{
    protected $command = 'file';

    public function postFile(PostFile $postFile)
    {
        $response = new Response();
        try {
            $http_response = $this->getRequest()->postFile($this->getCommand(), $postFile);
            $response->setResponse($http_response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response->setResponse($e->getResponse());
            }
        }
        $response->setObject($this);
        return $response;
    }
}