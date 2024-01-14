<?php

namespace Kintone\File;

use GuzzleHttp\Psr7\UploadedFile;
use Kintone\Base;
use Kintone\Response;

/**
 * ファイルをダウンロードする
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/files/download-file/
 *
 * ファイルをアップロードする
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/files/upload-file/
 */
class File extends Base
{
    protected string $resource = 'file';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByFileKey(string $fileKey): Response
    {
        return $this->get(['fileKey' => $fileKey]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postFile(UploadedFile $postFile): Response
    {
        $http_response = $this->getRequest()->postFile($this->getResource(), $postFile);

        return new Response($this, $http_response);
    }
}
