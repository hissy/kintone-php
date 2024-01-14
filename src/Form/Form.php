<?php

namespace Kintone\Form;

use Kintone\Base;

/**
 * フォームの設計情報を取得する
 * @link https://cybozu.dev/ja/kintone/docs/rest-api/apps/form/get-form/
 */
class Form extends Base
{
    protected string $resource = 'form';

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getByAppID($app): \Kintone\Response
    {
        return $this->get(['app' => $app]);
    }
}
