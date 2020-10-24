<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\EntityTypeQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $id [bigint]
 * @property string $type [varchar(16)]
 * @property string $name [varchar(255)]
 */
class EntityType extends ActiveRecord
{
    public const ID_CONTACT  = 1;
    public const ID_LEAD     = 2;
    public const ID_COMPANY  = 3;
    public const ID_CATALOG  = 10;
    public const ID_CUSTOMER = 12;

    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%entity_type}}';
    }

    public static function primaryKey(): array
    {
        return ['id'];
    }

    public static function find(): EntityTypeQuery
    {
        return new EntityTypeQuery(static::class);
    }

}