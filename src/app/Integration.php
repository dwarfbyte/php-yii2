<?php

namespace amocrmtech\models\ar\app;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;

/**
 * @property int    $id           [bigint]
 * @property string $secret_key   [varchar(255)]
 * @property string $redirect_uri [varchar(255)]
 */
class Integration extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @throws InvalidConfigException
     */
    public static function getDb()
    {
        $db = Yii::$app->params['amocrmtech.models.ar.app.db'];
        return Yii::$app->get($db);
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName(): string
    {
        return '{{%integration}}';
    }

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            ['id', 'string'],
            ['id', 'required'],

            ['secret_key', 'string'],
            ['secret_key', 'required'],

            ['redirect_uri', 'url'],
            ['redirect_uri', 'required'],
        ];
    }
}