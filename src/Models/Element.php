<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\LinkQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $id [bigint]
 * @property string $type [varchar(16)]
 * @property string $name [varchar(255)]
 */
class Element extends ActiveRecord
{
    public const ID_CONTACT  = 1;
    public const ID_LEAD     = 2;
    public const ID_COMPANY  = 3;
    public const ID_CATALOG  = 10;
    public const ID_CUSTOMER = 12;

    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%element}}';
    }

    public static function primaryKey(): array
    {
        return ['id'];
    }

    public static function find(): LinkQuery
    {
        return new LinkQuery(static::class);
    }

}