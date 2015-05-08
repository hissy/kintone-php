# The Kintone SDK for PHP

[![Build Status](https://travis-ci.org/hissy/kintone-php.svg?branch=master)](https://travis-ci.org/hissy/kintone-php)

cybozu.com にて提供されている [kintone REST API](https://cybozudev.zendesk.com/hc/ja/categories/200147600-kintone-API) を使いやすくするPHP製のライブラリです。

## 必要条件

PHP 5.4+

## インストール方法

### コンポーザー

    "require": {
        "hissy/kintone-php": "dev-master"
    }

## 使い方

```php
require 'vendor/autoload.php';

use Kintone\Request;
use Kintone\Object;
use Kintone\App\App;

// サブドメイン
$subdomain = '012ab';
// APIトークン
$apitoken  = 'BuBNIwbRRaUvr33nWXcfUZ5VhaFsJxN0xH4NPN92';

// 初期設定
$request = new Request($subdomain,$apitoken);

// アプリ情報の取得
$appID = 15;
$app = new App($request);
$res = $app->getByID($appID);

if ($res->isSuccess()) {
    // アプリ名の表示
    echo $res->getName();
} else {
    // ステータスコードの表示
    echo $res->getStatusCode();
    // エラーメッセージの表示
    echo $res->getMessage();
}

// 短縮型
$name = (new App($request))->getByID($appID)->getName();

// コマンドとパラメーターを直接指定して情報を取得する方法
$app = new Object($request);
$app->setCommand('app');
$res = $app->get(['id' => $appID]);
echo $res->getValue('name'); // 結果は App を使った場合と同じ

```

詳細はWikiをご覧ください。

## ライセンス

MITライセンス
