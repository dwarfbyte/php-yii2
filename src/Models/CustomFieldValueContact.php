<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CustomFieldValueContactQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $element_id
 * @property int    $account_id
 * @property int    $entity_id
 * @property int    $field_id
 * @property string $field_name
 * @property string $field_code
 * @property string $field_type
 * @property array  $values
 * @property int    $deleted_at
 */
class CustomFieldValueContact extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'custom_field_value_contact';
    }

    public static function primaryKey(): array
    {
        return ['element_id', 'account_id', 'entity_id', 'field_id'];
    }

    public static function find(): CustomFieldValueContactQuery
    {
        return new CustomFieldValueContactQuery(static::class);
    }
}