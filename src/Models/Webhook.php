<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\WebhookQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Webhook extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function find(): WebhookQuery
    {
        return new WebhookQuery(static::class);
    }
}