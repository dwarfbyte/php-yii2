<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CustomerQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;

class Customer
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function find(): CustomerQuery
    {
        return new CustomerQuery(static::class);
    }
}