<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int $account_id [bigint]
 * @property int $id [bigint]
 * @property int $pipeline_id [bigint]
 * @property int $status_id [bigint]
 * @property string $name [varchar(255)]
 * @property int $sale [numeric(18,2)]
 * @property int $responsible_user_id [bigint]
 * @property int $group_id [bigint]
 * @property int $main_contact_id [bigint]
 * @property int $created_by [bigint]
 * @property string $created_at [timestamp with time zone]
 * @property int $updated_by [bigint]
 * @property string $updated_at [timestamp with time zone]
 * @property string $closest_task_at [timestamp with time zone]
 * @property bool $is_price_modified_by_robot [boolean]
 * @property bool $is_deleted [boolean]
 * @property string $closed_at [timestamp with time zone]
 * @property int $loss_reason_id [bigint]
 */
class Lead extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @return Connection
     * @throws InvalidConfigException
     */
    public static function getDb(): Connection
    {
        $locator = Yii::$app->params['amocrmtech.models.ar.locator'];
        $db      = Yii::$app->params['amocrmtech.models.ar.amo.db'];
        /** @noinspection PhpIncompatibleReturnTypeInspection,NullPointerExceptionInspection */
        return Yii::$app->get($locator)->get($db);
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'lead';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['account_id', 'id'];
    }
}