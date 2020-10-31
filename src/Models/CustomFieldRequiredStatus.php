<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CustomFieldRequiredStatusQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class CustomFieldRequiredStatus extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'custom_field_required_status';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'custom_field_id', 'id'];
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public static function find(): CustomFieldRequiredStatusQuery
    {
        return new CustomFieldRequiredStatusQuery(static::class);
    }
}