<?php
namespace Kintone\Tests;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\Psr7\Utils;
use Kintone\Base;
use Kintone\Request;
use Kintone\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamFactoryInterface;

class ResponseTest extends TestCase
{
    public function testSetupResponseObject()
    {
        $httpResponse = new GuzzleResponse(200);

        $request = $this->createMock(Request::class);
        $obj = new Base($request);

        $response = new Response($obj, $httpResponse);
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

        $httpResponse = new GuzzleResponse(
            200, // Status code
            [], // Headers
            $json // Body
        );

        $request = $this->createMock(Request::class);
        $obj = new Base($request);

        $response = new Response($obj, $httpResponse);
        $this->assertEquals("CB_IJ01", $response->getValue("code"));
        $this->assertEquals("CB_IJ01", $response->getCode());
    }
}