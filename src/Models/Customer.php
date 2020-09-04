<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\CustomerQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;

class Customer
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function find(): CustomerQuery
    {
        return new CustomerQuery(static::class);
    }
}