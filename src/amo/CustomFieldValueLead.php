<?php
namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\Connection;

/**
 *
 */
class CustomFieldValueLead extends CustomFieldValue
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
     * @return string
     */
    public static function tableName()
    {
        return 'custom_field_value_lead';
    }

    /**
     * @return array|string[]
     */
    public static function primaryKey()
    {
        return ['account_id', 'entity_id', 'field_id'];
    }
}