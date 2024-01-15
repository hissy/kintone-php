# The kintone SDK for PHP

cybozu.com にて提供されている [kintone REST API](https://cybozudev.zendesk.com/hc/ja/categories/200147600-kintone-API) を使いやすくするPHP製のライブラリです。

## 必要条件

PHP 8.0+

これより古いPHPのバージョンで動作させたい場合、betaブランチをご利用ください。

## インストール方法

### コンポーザー

    "require": {
        "hissy/kintone-php": "dev-master"
    }

## 使い方

```php
require 'vendor/autoload.php';

use Kintone\Request;
use Kintone\Base;
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
try {
    // IDを指定してアプリ情報を取得
    $res = $app->getByID($appID);
    echo $res->getName();
} catch (\GuzzleHttp\Exception\ServerException $e) {
    // 5xxエラーレスポンスの取得
    echo $e->getResponse()->getBody();
} catch (\GuzzleHttp\Exception\ClientException $e) {
    // 4xxエラーレスポンスの取得
    echo $e->getResponse()->getBody();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo get_class($e) . ': ' . $e->getMessage();
}

// 短縮型
$name = (new App($request))->getByID($appID)->getName();
echo $name;

// コマンドとパラメーターを直接指定して情報を取得する方法
$app = new Base($request);
$app->setResource('app');
$res = $app->get(['id' => $appID]);
echo $res->getValue('name'); // 結果は App を使った場合と同じ

```

詳細はWikiをご覧ください。

## ライセンス

MITライセンス
