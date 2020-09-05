<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id [bigint]
 * @property int    $id [bigint]
 * @property int    $pipeline_id [bigint]
 * @property int    $status_id [bigint]
 * @property string $name [varchar(255)]
 * @property int    $sale [numeric(18,2)]
 * @property int    $responsible_user_id [bigint]
 * @property int    $group_id [bigint]
 * @property int    $main_contact_id [bigint]
 * @property int    $created_by [bigint]
 * @property string $created_at [timestamp with time zone]
 * @property int    $updated_by [bigint]
 * @property string $updated_at [timestamp with time zone]
 * @property string $closest_task_at [timestamp with time zone]
 * @property bool   $is_price_modified_by_robot [boolean]
 * @property bool   $is_deleted [boolean]
 * @property string $closed_at [timestamp with time zone]
 * @property int    $loss_reason_id [bigint]
 */
class Lead extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'lead';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }
}