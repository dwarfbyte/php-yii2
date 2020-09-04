<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\WebhookQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Webhook extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function find(): WebhookQuery
    {
        return new WebhookQuery(static::class);
    }
}