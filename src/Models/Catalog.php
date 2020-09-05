<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CatalogQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Catalog extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function find(): CatalogQuery
    {
        return new CatalogQuery(static::class);
    }
}