<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int $element_id [bigint]
 * @property int    $account_id   [bigint]
 * @property int    $id           [bigint]
 * @property int    $catalog_id   [bigint]
 * @property string $name         [varchar(255)]
 * @property int    $field_type   [bigint]
 * @property int    $sort         [bigint]
 * @property string $code         [varchar(255)]
 * @property bool   $is_multiple  [boolean]
 * @property bool   $is_system    [boolean]
 * @property bool   $is_editable  [boolean]
 * @property bool   $is_required  [boolean]
 * @property bool   $is_deletable [boolean]
 * @property bool   $is_visible   [boolean]
 * @property string $params       [jsonb]
 * @property string $enums        [jsonb]
 * @property string $values_tree  [jsonb]
 * @property int    $deleted_at   [timestamp]
 */
class CustomField extends ActiveRecord
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
        return '{{%custom_field}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['element_id', 'account_id', 'id'];
    }
}