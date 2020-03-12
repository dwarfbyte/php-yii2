<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int    $id [bigint]
 * @property string $type [varchar(16)]
 * @property string $name [varchar(255)]
 */
class Element extends ActiveRecord
{
    public const ID_CONTACT  = 1;
    public const ID_LEAD     = 2;
    public const ID_COMPANY  = 3;
    public const ID_CATALOG  = 10;
    public const ID_CUSTOMER = 12;

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
        return '{{%element}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['id'];
    }

}