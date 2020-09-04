<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\CustomFieldValueLeadQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

// todo extends CustomFieldValue?
class CustomFieldValueLead extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return 'custom_field_value_lead';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'entity_id', 'field_id'];
    }

    public static function find(): CustomFieldValueLeadQuery
    {
        return new CustomFieldValueLeadQuery(static::class);
    }
}