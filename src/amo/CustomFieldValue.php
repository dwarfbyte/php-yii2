<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int $account_id [bigint]
 * @property int $entity_id [bigint]
 * @property int $field_id [bigint]
 * @property string $values [jsonb]
 * @property string $entity_type [varchar(15)]
 */
class CustomFieldValue extends ActiveRecord
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
     * @return string
     */
    public static function tableName()
    {
        return 'custom_field_value';
    }
}