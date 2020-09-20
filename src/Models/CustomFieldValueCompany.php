<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CustomFieldValueCompanyQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class CustomFieldValueCompany extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'custom_field_value_company';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'entity_id', 'field_id'];
    }

    public static function find(): CustomFieldValueCompanyQuery
    {
        return new CustomFieldValueCompanyQuery(static::class);
    }
}