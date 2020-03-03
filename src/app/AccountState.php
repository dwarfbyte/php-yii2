<?php

namespace amocrmtech\models\ar\app;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;

/**
 * @property int    $id [bigint]
 * @property string $subdomain [varchar(255)]
 * @property string $status [integer]
 */
class AccountState extends ActiveRecord
{
    public const STATUS_DELETED = 0;
    public const STATUS_ACTIVE  = 10;

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
        return '{{%account_state}}';
    }

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            ['id', 'integer'],
            ['id', 'required'],

            ['subdomain', 'string'],
            ['subdomain', 'required'],

            ['status', 'in', 'range' => [self::STATUS_DELETED, self::STATUS_ACTIVE]],
            ['status', 'required'],
        ];
    }
}