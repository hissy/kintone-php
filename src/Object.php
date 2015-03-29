<?php
namespace Kintone;

use Kintone\Request;
use Kintone\Response;

class Object
{
    const VERSION = '0.0.1';
    
    protected $command = '';
    /* @var Kintone\Request */
    private $request;
    /* @var GuzzleHttp\Message\Response */
    private $response;
    
    public function getCommand() { return $this->command; }
    public function getRequest() { return $this->request; }
    public function getHttpResponse() { return $this->response; }
    public function getError() { return $this->error; }
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function setCommand($command)
    {
        $this->command = $command;
    }
    
    public function get(array $options = [])
    {
        $response = new Response();
        try {
            $http_response = $this->getRequest()->get($this->getCommand(), $options);
            $response->setResponse($http_response);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            if ($e->hasResponse()) {
                $response->setResponse($e->getResponse());
            }
        }
        $response->setObject($this);
        return $response;
    }
    
    public function post(array $options = [])
    {
        $response = new Response();
        try {
            $http_response = $this->getRequest()->post($this->getCommand(), $options);
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