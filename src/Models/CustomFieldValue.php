<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CustomFieldValueQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id [bigint]
 * @property int    $entity_id [bigint]
 * @property int    $field_id [bigint]
 * @property string $values [jsonb]
 * @property string $entity_type [varchar(15)]
 */
class CustomFieldValue extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'custom_field_value';
    }

    public static function find(): CustomFieldValueQuery
    {
        return new CustomFieldValueQuery(static::class);
    }
}