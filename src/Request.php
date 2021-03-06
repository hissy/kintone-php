<?php
namespace Kintone;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Post\PostFile;

class Request
{
    const VERSION = '0.0.1';
    const API_BASE_URL = 'https://{subdomain}.cybozu.com/k/{version}/';
    const API_HOST = '{subdomain}.cybozu.com:443';
    const API_URL_EXT = '.json';

    private $token = '';
    private $subdomain = '';
    private $client;
    private $defaultOptions = ['allow_redirects' => false];

    public function __construct($subdomain, $token)
    {
        $client = new GuzzleClient([
            'base_url' => [self::API_BASE_URL, [
                'subdomain' => $subdomain,
                'version' => 'v1'
            ]],
            'defaults' => [
                'headers' => [
                    'Host' => str_replace('{subdomain}',$subdomain,self::API_HOST),
                    'X-Cybozu-API-Token' => $token
                ]
            ]
        ]);
        $this->subdomain = $subdomain;
        $this->token = $token;
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function get($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->get($url . self::API_URL_EXT, $params);
    }

    public function head($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->head($url . self::API_URL_EXT, $params);
    }

    public function delete($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->delete($url . self::API_URL_EXT, $params);
    }

    public function put($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->put($url . self::API_URL_EXT, $params);
    }

    public function patch($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->patch($url . self::API_URL_EXT, $params);
    }

    public function post($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->post($url . self::API_URL_EXT, $params);
    }

    public function postFile($url = null, PostFile $file)
    {
        $request = $this->client->createRequest('POST', $url . self::API_URL_EXT);
        $postBody = $request->getBody();
        $postBody->addFile($file);
        return $this->client->send($request);
    }

    public function options($url = null, array $options = [])
    {
        $params = $this->defaultOptions;
        if (count($options) > 0) {
            $params['json'] = $options;
        }
        return $this->client->options($url . self::API_URL_EXT, $params);
    }
}
