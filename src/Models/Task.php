<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\TaskQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;

class Task
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function find(): TaskQuery
    {
        return new TaskQuery(static::class);
    }
}