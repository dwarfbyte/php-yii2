<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\TagLeadQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int $account_id [bigint]
 * @property int $tag_id [bigint]
 * @property int $lead_id [bigint]
 */
class TagLead extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%tag_lead}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'tag_id', 'lead_id'];
    }

    public static function find(): TagLeadQuery
    {
        return new TagLeadQuery(static::class);
    }
}