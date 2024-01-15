<?php
namespace Kintone\Tests\File;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\UploadedFile;
use Kintone\File\File;
use Kintone\Request;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testPostFile()
    {
        $file = new UploadedFile(
            __DIR__ . '/SamplePDFFile.pdf',
            filesize(__DIR__ . '/SamplePDFFile.pdf'),
            UPLOAD_ERR_OK,
            'SamplePDFFile.pdf',
            'application/pdf'
        );

        $observer = $this->createMock(Request::class);
        $observer->expects($this->once())
                 ->method('postFile')
                 ->with('file', $file)
                 ->willReturn(new Response(200));

        $obj = new File($observer);
        $response = $obj->postFile($file);

        $this->assertTrue($response->isSuccess());
    }
}