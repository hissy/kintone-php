<?php

namespace Kintone\Record;

use Kintone\Base;
use Kintone\Response;

/**
 * 複数のレコードを取得する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/get-records/
 *
 * 複数のレコードを登録する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/add-records/
 *
 * 複数のレコードを更新する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/update-records/
 *
 * 複数のレコードを削除する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/records/delete-records/
 */
class Records extends Base
{
    protected string $resource = 'records';
}
