<?php

namespace amocrmtech\models\ar\amo;

use amocrmtech\models\ar\amo\query\CredentialsCookiesQuery;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int     $id [bigint]
 * @property int     $account_id [bigint]
 * @property string  $account_subdomain [varchar(255)]
 * @property int     $deleted_at [timestamp]
 * @property string  $login [varchar(255)]
 * @property string  $token [varchar(255)]
 *
 * @property Account $account
 */
class CredentialsCookies extends ActiveRecord
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
    public static function tableName(): string
    {
        return '{{%credentials_cookies}}';
    }

    /**
     * {@inheritdoc}
     * @return CredentialsCookiesQuery the active query used by this AR class.
     */
    public static function find(): CredentialsCookiesQuery
    {
        return new CredentialsCookiesQuery(static::class);
    }

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            ['account_id', 'exist', 'targetClass' => Account::class, 'targetAttribute' => 'id'],
            ['account_id', 'required'],

            ['account_subdomain', 'exist', 'targetClass' => Account::class, 'targetAttribute' => 'subdomain'],
            ['account_subdomain', 'required'],

            ['login', 'string'],
            ['login', 'required'],

            ['token', 'string'],
            ['token', 'required'],

            ['deleted_at', 'datetime', 'format' => 'php:Y-m-d H:i:s'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAccount(): ActiveQuery
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('credentials');
    }
}