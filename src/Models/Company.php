<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\CompanyQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id [bigint]
 * @property int    $id [bigint]
 * @property string $name [varchar(255)]
 * @property int    $responsible_user_id [bigint]
 * @property int    $created_by [bigint]
 * @property string $created_at [timestamp with time zone]
 * @property int    $updated_by [bigint]
 * @property string $updated_at [timestamp with time zone]
 * @property int    $group_id [bigint]
 * @property string $closest_task_at [timestamp with time zone]
 * @property int    $deleted_at [timestamp]
 */
class Company extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'company';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }

    public static function find(): CompanyQuery
    {
        return new CompanyQuery(static::class);
    }
}