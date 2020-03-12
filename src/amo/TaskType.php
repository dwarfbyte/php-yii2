<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;

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
        return '{{%task_type}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['account_id', 'id'];
    }
}