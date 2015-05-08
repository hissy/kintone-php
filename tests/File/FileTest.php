<?php
namespace Kintone\Tests\File;

use Kintone\File\File;
use \GuzzleHttp\Post\PostFile;
use \GuzzleHttp\Message\Response as GuzzleResponse;

class FileTest extends \PHPUnit_Framework_TestCase
{
    public function testPostFile()
    {
        $file = new PostFile('file', fopen(__FILE__, 'r'));

        $request = $this->getMockBuilder('\\Kintone\\Request')
                        ->disableOriginalConstructor()
                        ->setMethods(array('postFile'))
                        ->getMock();

        $request->expects($this->once())
                ->method('postFile')
                ->with('file', $file)
                ->willReturn(new GuzzleResponse(200));

        $obj = new File($request);
        $obj->postFile($file);
    }
}