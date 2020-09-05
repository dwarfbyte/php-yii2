<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\TagContactQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int $account_id [bigint]
 * @property int $tag_id [bigint]
 * @property int $contact_id [bigint]
 */
class TagContact extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%tag_contact}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'tag_id', 'contact_id'];
    }

    public static function find(): TagContactQuery
    {
        return new TagContactQuery(static::class);
    }
}