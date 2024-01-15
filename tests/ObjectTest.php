<?php
namespace Kintone\Tests;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Kintone\Request;
use Kintone\Response;
use Kintone\Base;
use PHPUnit\Framework\TestCase;

class ObjectTest extends TestCase
{
    public function testSetRequest()
    {
        $httpResponse = new GuzzleResponse(200);

        $request = $this->createMock(Request::class);
        $request->expects($this->once())
            ->method('get')
            ->willReturn(new GuzzleResponse(200));

        $obj = new Base($request);
        $requestedResponse = $obj->get();

        $response = new Response($obj, $httpResponse);

        $this->assertEquals($response->getStatusCode(), $requestedResponse->getStatusCode());
    }

    public function testGetRequestParameters()
    {
        $url = 'foo';
        $params = ['foo' => 'bar'];

        $request = $this->createMock(Request::class);
        $request->expects($this->once())
            ->method('get')
            ->with($url,$params)
            ->willReturn(new GuzzleResponse(200));

        $obj = new Base($request);
        $obj->setResource($url);
        $obj->get($params);
    }

    public function testPostRequestParameters()
    {
        $url = 'foo';
        $params = ['foo' => 'bar'];

        $request = $this->createMock(Request::class);
        $request->expects($this->once())
            ->method('post')
            ->with($url,$params)
            ->willReturn(new GuzzleResponse(200));

        $obj = new Base($request);
        $obj->setResource($url);
        $obj->post($params);
    }
}