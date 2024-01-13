<?php

namespace Kintone;

class Base
{
    protected string $resource = '';
    protected Request $request;

    public function getResource(): string
    {
        return $this->resource;
    }
    public function getRequest(): Request
    {
        return $this->request;
    }

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setResource(string $resource)
    {
        $this->resource = $resource;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $options = []): Response
    {
        $http_response = $this->getRequest()->get($this->getResource(), $options);

        return new Response($this, $http_response);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(array $options = []): Response
    {
        $http_response = $this->getRequest()->post($this->getResource(), $options);

        return new Response($this, $http_response);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(array $options = []): Response
    {
        $http_response = $this->getRequest()->put($this->getResource(), $options);

        return new Response($this, $http_response);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(array $options = []): Response
    {
        $http_response = $this->getRequest()->delete($this->getResource(), $options);

        return new Response($this, $http_response);
    }
}
