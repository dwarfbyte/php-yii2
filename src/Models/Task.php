<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\TaskQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;

class Task
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function find(): TaskQuery
    {
        return new TaskQuery(static::class);
    }
}