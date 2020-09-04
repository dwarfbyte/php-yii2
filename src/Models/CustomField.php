<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\CustomFieldQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $element_id [bigint]
 * @property int    $account_id   [bigint]
 * @property int    $id           [bigint]
 * @property int    $catalog_id   [bigint]
 * @property string $name         [varchar(255)]
 * @property int    $field_type   [bigint]
 * @property int    $sort         [bigint]
 * @property string $code         [varchar(255)]
 * @property bool   $is_multiple  [boolean]
 * @property bool   $is_system    [boolean]
 * @property bool   $is_editable  [boolean]
 * @property bool   $is_required  [boolean]
 * @property bool   $is_deletable [boolean]
 * @property bool   $is_visible   [boolean]
 * @property string $params       [jsonb]
 * @property string $enums        [jsonb]
 * @property string $values_tree  [jsonb]
 * @property int    $deleted_at   [timestamp]
 */
class CustomField extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%custom_field}}';
    }

    public static function primaryKey(): array
    {
        return ['element_id', 'account_id', 'id'];
    }

    public static function find(): CustomFieldQuery
    {
        return new CustomFieldQuery(static::class);
    }
}