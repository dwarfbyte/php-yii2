<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\TagQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Tag extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
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