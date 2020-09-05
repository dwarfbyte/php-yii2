<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\TagCompanyQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int $account_id [bigint]
 * @property int $tag_id [bigint]
 * @property int $company_id [bigint]
 */
class TagCompany extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%tag_company}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'tag_id', 'company_id'];
    }

    public static function find(): TagCompanyQuery
    {
        return new TagCompanyQuery(static::class);
    }
}