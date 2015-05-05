<?php
namespace Kintone\Tests;

use \Kintone\Response;
use \GuzzleHttp\Message\Response as GuzzleResponse;
use \GuzzleHttp\Stream\Stream as GuzzleStream;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testSetupResponseObject()
    {
        $response = new Response();
        $response->setResponse(new GuzzleResponse(200));
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response->isSuccess());
    }

    public function testGetJsonValue()
    {
        $json = '{
            "message":"不正なJSON文字列です。",
            "id":"1505999166-897850006",
            "code":"CB_IJ01"
        }';
        $response = new Response();
        $response->setResponse(
            new GuzzleResponse(
                200, // Response Code
                [], // Headers
                GuzzleStream::factory($json)
            )
        );
        $this->assertEquals("CB_IJ01", $response->getValue("code"));
        $this->assertEquals("CB_IJ01", $response->getCode());
    }
}