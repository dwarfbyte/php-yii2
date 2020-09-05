<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\ContactLeadQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 *
 * @property int $account_id [bigint]
 * @property int $contact_id [bigint]
 * @property int $lead_id [bigint]
 */
class ContactLead extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'contact_lead';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'contact_id', 'lead_id'];
    }

    public static function find(): ContactLeadQuery
    {
        return new ContactLeadQuery(static::class);
    }
}