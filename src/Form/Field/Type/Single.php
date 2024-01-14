<?php

namespace Kintone\Form\Field\Type;

use Kintone\Form\Field\FieldType;

class Single extends FieldType
{
    public function populateFromArray(array $array = [])
    {
        $this->setProperties($array);
    }

    public function setProperties(array $array = [])
    {
        $this->properties = $array;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * フィールド名を取得する
     *
     * @return string
     */
    public function getLabel(): string
    {
        if (isset($this->properties['label'])) {
            return (string) $this->properties['label'];
        }

        return '';
    }

    /**
     * フィールドコードを取得する
     *
     * @return string
     */
    public function getFieldCode(): string
    {
        if (isset($this->properties['code'])) {
            return (string) $this->properties['code'];
        }

        return '';
    }

    /**
     * 要素の ID を取得する
     *
     * @return string
     */
    public function getElementID(): string
    {
        if (isset($this->properties['elementId'])) {
            return (string) $this->properties['elementId'];
        }

        return '';
    }

    /**
     * フィールドのタイプを取得する
     *
     * @return string
     */
    public function getFieldType(): string
    {
        if (isset($this->properties['type'])) {
            return (string) $this->properties['type'];
        }

        return '';
    }

    /**
     * フィールド名を表示しないどうかを取得する
     *
     * @return bool
     */
    public function noLabel(): bool
    {
        if (isset($this->properties['noLabel'])) {
            return $this->properties['noLabel'] === 'true';
        }

        return false;
    }

    /**
     * 必須項目にするかどうかを取得する
     *
     * @return bool
     */
    public function isRequired(): bool
    {
        if (isset($this->properties['required'])) {
            return $this->properties['required'] === 'true';
        }

        return false;
    }

    /**
     * 値の重複を許可するかどうかを取得する
     *
     * @return bool
     */
    public function isUnique(): bool
    {
        if (isset($this->properties['unique'])) {
            return $this->properties['unique'] === 'true';
        }

        return false;
    }

    /**
     * 値の制限（最大）を取得する
     *
     * @return int|null
     */
    public function getMaxValue(): ?int
    {
        if (isset($this->properties['maxValue'])) {
            return (int) $this->properties['maxValue'];
        }

        return null;
    }

    /**
     * 値の制限（最小）を取得する
     *
     * @return int|null
     */
    public function getMinValue(): ?int
    {
        if (isset($this->properties['minValue'])) {
            return (int) $this->properties['minValue'];
        }

        return null;
    }

    /**
     * 文字数（最大）を取得する
     *
     * @return int|null
     */
    public function getMaxLength(): ?int
    {
        if (isset($this->properties['maxLength'])) {
            return (int) $this->properties['maxLength'];
        }

        return null;
    }

    /**
     * 文字数（最小）を取得する
     *
     * @return int|null
     */
    public function getMinLength(): ?int
    {
        if (isset($this->properties['minLength'])) {
            return (int) $this->properties['minLength'];
        }

        return null;
    }

    /**
     * 初期値を取得する
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        if (isset($this->properties['defaultValue'])) {
            return (string) $this->properties['defaultValue'];
        }

        return null;
    }

    /**
     * 初期値に設定された式を取得する
     *
     * @return string|null
     */
    public function getDefaultExpression(): ?string
    {
        if (isset($this->properties['defaultExpression'])) {
            return (string) $this->properties['defaultExpression'];
        }

        return null;
    }

    /**
     * 項目の一覧を取得する
     *
     * @return array
     */
    public function getOptions(): array
    {
        if (isset($this->properties['options'])) {
            return (array) $this->properties['options'];
        }

        return [];
    }

    /**
     * フォーマットを取得する
     *
     * @return string
     */
    public function getFormat(): string
    {
        if (isset($this->properties['format'])) {
            return (string) $this->properties['format'];
        }

        return '';
    }

    /**
     * 単位記号を取得する
     *
     * @return string|null
     */
    public function getUnit(): ?string
    {
        if (isset($this->properties['unit'])) {
            return (string) $this->properties['unit'];
        }

        return null;
    }

    /**
     * 単位記号を付ける位置を取得する
     *
     * @return string|null
     */
    public function getUnitPosition(): ?string
    {
        if (isset($this->properties['unitPosition'])) {
            return (string) $this->properties['unitPosition'];
        }

        return null;
    }

    /**
     * リンクの種類を取得する
     *
     * @return string
     */
    public function getProtocol(): string
    {
        if (isset($this->properties['protocol'])) {
            return (string) $this->properties['protocol'];
        }

        return '';
    }

    public function isMultiple(): bool
    {
        return false;
    }
}
