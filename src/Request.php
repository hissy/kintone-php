<?php

namespace Kintone;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface;

class Request
{
    public const API_BASE_URL = 'https://{subdomain}.cybozu.com/k/{version}/';
    public const API_HOST = '{subdomain}.cybozu.com:443';
    public const API_URL_EXT = '.json';

    private string $token = '';
    private string $subdomain = '';
    private GuzzleClient $client;
    private array $defaultOptions;

    public function __construct($subdomain, $token)
    {
        $base_url = str_replace(['{subdomain}', '{version}'], [$subdomain, 'v1'], self::API_BASE_URL);
        $client = new GuzzleClient(['base_url' => $base_url]);
        $this->defaultOptions = [
            'headers' => [
                'Host' => str_replace('{subdomain}', $subdomain, self::API_HOST),
                'X-Cybozu-API-Token' => $token,
                'Content-Type' => 'application/json',
            ],
            'allow_redirects' => false,
        ];
        $this->subdomain = $subdomain;
        $this->token = $token;
        $this->client = $client;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getSubdomain(): string
    {
        return $this->subdomain;
    }

    public function getClient(): GuzzleClient
    {
        return $this->client;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $resource, array $options = []): ResponseInterface
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->get($resource . self::API_URL_EXT, $params);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function head(string $resource, array $options = []): ResponseInterface
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->head($resource . self::API_URL_EXT, $params);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $resource, array $options = []): ResponseInterface
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->delete($resource . self::API_URL_EXT, $params);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $resource, array $options = []): ResponseInterface
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->put($resource . self::API_URL_EXT, $params);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function patch(string $resource, array $options = []): ResponseInterface
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->patch($resource . self::API_URL_EXT, $params);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $resource, array $options = []): ResponseInterface
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->post($resource . self::API_URL_EXT, $params);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postFile(string $resource, UploadedFile $file): ResponseInterface
    {
        $params = $this->defaultOptions;
        $params['multipart'] = [
            [
                'name' => 'file',
                'contents' => $file->getStream(),
                'filename' => $file->getClientFilename(),
            ],
        ];
        return $this->client->post($resource . self::API_URL_EXT, $params);
    }
}
