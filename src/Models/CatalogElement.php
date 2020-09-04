<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\CatalogElementQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class CatalogElement extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function find(): CatalogElementQuery
    {
        return new CatalogElementQuery(static::class);
    }
}