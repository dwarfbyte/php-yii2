<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\ContactQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id [bigint]
 * @property int    $id [bigint]
 * @property int    $responsible_user_id [bigint]
 * @property int    $created_by [bigint]
 * @property string $created_at [timestamp with time zone]
 * @property int    $updated_by [bigint]
 * @property string $updated_at [timestamp with time zone]
 * @property int    $group_id [bigint]
 * @property int    $company_id [bigint]
 * @property string $closest_task_at [timestamp with time zone]
 * @property int    $deleted_at [timestamp]
 */
class Contact extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return 'contact';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }

    public static function find(): ContactQuery
    {
        return new ContactQuery(static::class);
    }
}