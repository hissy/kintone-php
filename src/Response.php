<?php
namespace Kintone;

use Kintone\Object;

class Response
{
    const VERSION = '0.0.1';
    
    private $response;
    private $object;
    private $exception;
    
    private function getResponseObject() { return $this->response; }
    public function getObject() { return $this->object; }
    
    public function setResponse(\GuzzleHttp\Message\Response $response)
    {
        $this->response = $response;
    }
    
    public function setObject(Object $object)
    {
        $this->object = $object;
    }
    
    public function getStatusCode()
    {
        $response = $this->getResponseObject();
        if (is_object($response)) {
            return $response->getStatusCode();
        }
    }
    
    public function isSuccess()
    {
        return ($this->getStatusCode() == 200);
    }
    
    public function getValue($key)
    {
        $response = $this->getResponseObject();
        if (is_object($response)) {
            try {
                $json = $response->json();
                if (is_array($json) && array_key_exists($key, $json)) {
                    return $json[$key];
                }
            } catch(\GuzzleHttp\Exception\ParseException $e) {
                
            }
        }
    }
    
    public function __call($name, $arguments)
    {
        $key = lcfirst(substr($name, 3));
        return $this->getValue($key);
    }
}