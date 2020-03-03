<?php
namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int $account_id [bigint]
 * @property int $id [bigint]
 * @property string $name [varchar(255)]
 * @property int $responsible_user_id [bigint]
 * @property int $created_by [bigint]
 * @property string $created_at [timestamp with time zone]
 * @property int $updated_by [bigint]
 * @property string $updated_at [timestamp with time zone]
 * @property int $group_id [bigint]
 * @property string $closest_task_at [timestamp with time zone]
 * @property int $deleted_at [timestamp]
 */
class Company extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @return Connection
     * @throws InvalidConfigException
     */
    public static function getDb(): Connection
    {
        $locator = Yii::$app->params['amocrmtech.models.ar.amo.locator'];
        $db      = Yii::$app->params['amocrmtech.models.ar.amo.locator.db'];
        /** @noinspection PhpIncompatibleReturnTypeInspection,NullPointerExceptionInspection */
        return Yii::$app->get($locator)->get($db);
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['account_id', 'id'];
    }
}