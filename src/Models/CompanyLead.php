<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CompanyLeadQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int $account_id [bigint]
 * @property int $company_id [bigint]
 * @property int $lead_id [bigint]
 */
class CompanyLead extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'company_lead';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'company_id', 'lead_id'];
    }

    public static function find(): CompanyLeadQuery
    {
        return new CompanyLeadQuery(static::class);
    }
}