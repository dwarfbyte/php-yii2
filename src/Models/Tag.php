<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\TagQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%tag}}';
    }

    public static function find(): TagQuery
    {
        return new TagQuery(static::class);
    }
}