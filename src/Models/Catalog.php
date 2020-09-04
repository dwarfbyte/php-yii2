<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\CatalogQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Catalog extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function find(): CatalogQuery
    {
        return new CatalogQuery(static::class);
    }
}