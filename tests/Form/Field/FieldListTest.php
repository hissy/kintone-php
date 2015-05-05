<?php
namespace Kintone\Tests\Form\Field;

use Kintone\Form\Field\FieldList;
use GuzzleHttp\Utils;

class FieldListTest extends \PHPUnit_Framework_TestCase
{
    // @link https://cybozudev.zendesk.com/hc/ja/articles/201941834-%E3%83%95%E3%82%A9%E3%83%BC%E3%83%A0%E8%A8%AD%E8%A8%88%E6%83%85%E5%A0%B1%E5%8F%96%E5%BE%97
    private $json = '{
        "properties": [
            {
                "code": "string_1",
                "defaultValue": "",
                "expression": "",
                "hideExpression": "false",
                "maxLength": "64",
                "minLength": null,
                "label": "string_1",
                "noLabel": "false",
                "required": "true",
                "type": "SINGLE_LINE_TEXT",
                "unique": "true"
            },
            {
                "code": "number_1",
                "defaultValue": "12345",
                "digit": "true",
                "displayScale": "4",
                "expression": "",
                "maxValue": null,
                "minValue": null,
                "label": "number_1",
                "noLabel": "true",
                "required": "false",
                "type": "NUMBER",
                "unique": "false"
            },
            {
                "code": "checkbox_1",
                "defaultValue": [
                    "sample1",
                    "sample3"
                ],
                "label": "checkbox_1",
                "noLabel": "false",
                "options": [
                    "sample1",
                    "sample2",
                    "sample3"
                ],
                "required": "false",
                "type": "CHECK_BOX"
            }
        ]
    }';

    public function testSetupFieldList()
    {
        $json = Utils::jsonDecode($this->json, true, 512, JSON_BIGINT_AS_STRING);
        $properties = $json['properties'];
        $fields = new FieldList($properties);
        $this->assertCount(3, $fields);

        $labels = [];
        foreach ($fields as $field) {
            $labels[] = $field->getLabel();
        }

        $expectedLabels = ["string_1", "number_1", "checkbox_1"];
        $this->assertEquals($expectedLabels, $labels);
    }
}