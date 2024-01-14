<?php

namespace Kintone\App;

use Kintone\Base;

/**
 * 複数のアプリの情報を取得する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/apps/get-apps/
 */
class Apps extends Base
{
    protected string $resource = 'apps';
}
