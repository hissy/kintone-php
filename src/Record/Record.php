<?php

namespace Kintone\Record;

use Kintone\Base;
use Kintone\Response;

/**
 * 1件のレコードを取得する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/get-record/
 *
 * 1件のレコードを登録する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/add-record/
 *
 * 1件のレコードを更新する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/update-record/
 */
class Record extends Base
{
    protected string $resource = 'record';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByID(int $appID, int $id): Response
    {
        return $this->get(['app' => $appID, 'id' => $id]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postRecord(int $appID, array $record): Response
    {
        return $this->post(['app' => $appID, 'record' => $record]);
    }
}
