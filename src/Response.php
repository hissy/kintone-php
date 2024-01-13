<?php

namespace Kintone;

use Psr\Http\Message\ResponseInterface;

class Response
{
    private ResponseInterface $response;
    private Base $object;

    public function __construct(Base $object, ResponseInterface $response)
    {
        $this->object = $object;
        $this->response = $response;
    }

    public function getBaseObject(): Base
    {
        return $this->object;
    }

    public function isSuccess(): bool
    {
        return $this->getStatusCode() === 200;
    }

    public function getStatusCode(): int
    {
        return $this->getResponseObject()->getStatusCode();
    }

    private function getResponseObject(): ResponseInterface
    {
        return $this->response;
    }

    public function __call($name, $arguments)
    {
        $key = lcfirst(substr($name, 3));
        return $this->getValue($key);
    }

    public function getValue($key)
    {
        $response = $this->getResponseObject();
        $json = json_decode($response->getBody()->getContents(), true);
        if (array_key_exists($key, $json)) {
            return $json[$key];
        }
    }
}
