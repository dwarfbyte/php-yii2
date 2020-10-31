<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CustomFieldNestedQuery;
use AmoCRMTech\Yii2\Models\Query\CustomFieldSettingsQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class CustomFieldSettings extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'custom_field_settings';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'custom_field_id'];
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public static function find(): CustomFieldSettingsQuery
    {
        return new CustomFieldSettingsQuery(static::class);
    }
}