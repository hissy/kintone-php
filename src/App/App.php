<?php

namespace Kintone\App;

use Kintone\Base;

/**
 * 1 件のアプリの情報を取得する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/apps/get-app/
 */
class App extends Base
{
    protected string $resource = 'app';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByID(int $id): \Kintone\Response
    {
        return $this->get(['id' => $id]);
    }
}
