# The Kintone SDK for PHP

cybozu.com にて提供されている [kintone REAT API](https://cybozudev.zendesk.com/hc/ja/categories/200147600-kintone-API) が使いやすくなる（予定の）PHP製のライブラリです。

## 必要条件

PHP 5.4+

## インストール

現在のところ、まだベータ版です。

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

### フォーム設計情報の取得

```php
require 'vendor/autoload.php';

use Kintone\Request;
use Kintone\Form\Form;

// 初期化
$subdomain = '012ab';
$apitoken  = 'BuBNIwbRRaUvr33nWXcfUZ5VhaFsJxN0xH4NPN92';
$request = new Request($subdomain,$apitoken);

// フォーム設計情報の取得
$properties = (new Form($request))->getByID($appID)->getProperties();
$fields = new FieldList($properties);

foreach($fields as $field) {
    // フィールドコードの取得
    echo $field->getFieldCode();
    
    // サブフィールドかどうか
    if ($field->isMultiple()) {
        foreach ($field as $subfield) {
            // フィールドラベルの取得
            echo $subfield->getLabel();
            // フィールドタイプの取得
            echo $subfield->getFieldType();
        }
    } else {
        echo $field->getLabel();
        echo $field->getFieldType();
    }
}
```

### フォーム送信

```php
require 'vendor/autoload.php';

use Kintone\Request;
use Kintone\Record\Record;

// 初期化
$subdomain = '012ab';
$apitoken  = 'BuBNIwbRRaUvr33nWXcfUZ5VhaFsJxN0xH4NPN92';
$request = new Request($subdomain,$apitoken);

// 投稿データ
$post_data = ['example_field_code' => ['value' => "Example Value"]];

// 投稿データを送信
$res = (new Record($request))->postRecord($appID, $post_data);

if ($res->isSuccess()) {
    // レコードID
    echo $res->getId();
    // リビジョン
    echo $res->getRevision();
}
```

## ToDo

* Object
    * Apps
    * Records
    * Record (PUT)
    * RecordItem - レコード１行に相当、GET, POST, PUT, DELETEで共通で使いたい
    * File (GET)
    * File (POST)
    * Space (GET)
* UnitTest

## ライセンス

MITライセンス