<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\TaskTypeQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id [bigint]
 * @property int    $id         [bigint]
 * @property string $name       [varchar(255)]
 * @property string $color      [varchar(255)]
 * @property int    $icon_id    [bigint]
 * @property int    $deleted_at [timestamp]
 */
class TaskType extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%task_type}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }

    public static function find(): TaskTypeQuery
    {
        return new TaskTypeQuery(static::class);
    }
}