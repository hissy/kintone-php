<?php
namespace Kintone\Tests;

use Kintone\Response;
use Kintone\Object;
use \GuzzleHttp\Message\Response as GuzzleResponse;

class ObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testSetRequest()
    {
        $httpResponse = new GuzzleResponse(200);

        $response = new Response();
        $response->setResponse($httpResponse);

        $request = $this->getMockBuilder('\\Kintone\\Request')
                        ->disableOriginalConstructor()
                        ->getMock();

        $request->method('get')
                ->willReturn($httpResponse);

        $obj = new Object($request);
        $requestedResponse = $obj->get();

        $this->assertEquals($response->getStatusCode(), $requestedResponse->getStatusCode());
    }

    public function testGetRequestParameters()
    {
        $url = 'foo';
        $params = ['foo' => 'bar'];

        $request = $this->getMockBuilder('\\Kintone\\Request')
                        ->disableOriginalConstructor()
                        ->setMethods(array('get'))
                        ->getMock();

        $request->expects($this->once())
                ->method('get')
                ->with($url,$params)
                ->willReturn(new GuzzleResponse(200));

        $obj = new Object($request);
        $obj->setCommand($url);
        $obj->get($params);
    }

    public function testPostRequestParameters()
    {
        $url = 'foo';
        $params = ['foo' => 'bar'];

        $request = $this->getMockBuilder('\\Kintone\\Request')
                        ->disableOriginalConstructor()
                        ->setMethods(array('post'))
                        ->getMock();

        $request->expects($this->once())
                ->method('post')
                ->with($url,$params)
                ->willReturn(new GuzzleResponse(200));

        $obj = new Object($request);
        $obj->setCommand($url);
        $obj->post($params);
    }
}