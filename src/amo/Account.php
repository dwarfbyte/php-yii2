<?php

namespace amocrmtech\models\ar\amo;

use amocrmtech\models\ar\amo\query\CredentialsCookiesQuery;
use amocrmtech\models\ar\amo\query\CredentialsOAuthQuery;
use amocrmtech\models\ar\app\AccountState;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int                     $id              [bigint]
 * @property string                  $name            [varchar(255)]
 * @property string                  $subdomain       [varchar(255)]
 * @property string                  $currency        [varchar(255)]
 * @property string                  $timezone        [varchar(255)]
 * @property string                  $timezone_offset [varchar(255)]
 * @property string                  $language        [varchar(255)]
 * @property string                  $date_pattern    [jsonb]
 * @property int                     $current_user    [bigint]
 *
 * @property-read CredentialsOAuth   $credentialsOAuth
 * @property-read CredentialsCookies $credentialsCookies
 * @property-read Pipeline[]         $pipelines
 * @property-read Status[]           $statuses
 * @property-read Group[]            $groups
 * @property-read UserAccount[]      $userAccounts
 */
class Account extends ActiveRecord
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
    public static function tableName(): string
    {
        return '{{%account}}';
    }

    /**
     * {@inheritDoc}
     */
    public function rules(): array
    {
        return [
            ['id', 'integer'],
            ['id', 'unique'],
            ['id', 'required'],

            ['subdomain', 'string'],
            ['subdomain', 'unique'],
            ['subdomain', 'required'],

            ['name', 'string'],

            ['currency', 'string'],

            ['timezone', 'string'],

            ['timezone_offset', 'string'],

            ['language', 'string'],

            ['date_pattern', 'safe'],

            ['current_user', 'integer'],
        ];
    }

    /**
     * @return CredentialsOAuthQuery
     */
    public function getCredentialsOAuth(): CredentialsOAuthQuery
    {
        return $this->hasOne(CredentialsOAuth::class, ['account_id' => 'id'])->inverseOf('account')->active();
    }

    /**
     * @return CredentialsCookiesQuery
     */
    public function getCredentialsCookies(): CredentialsCookiesQuery
    {
        return $this->hasOne(CredentialsCookies::class, ['account_id' => 'id'])->inverseOf('account')->active();
    }

    /**
     * @return ActiveQuery
     */
    public function getPipelines(): ActiveQuery
    {
        return $this->hasMany(Pipeline::class, ['account_id' => 'id'])->inverseOf('account');
    }

    /**
     * @return ActiveQuery
     */
    public function getStatuses(): ActiveQuery
    {
        return $this->hasMany(Status::class, ['account_id' => 'id'])->inverseOf('account');
    }

    /**
     * @return ActiveQuery
     */
    public function getGroups(): ActiveQuery
    {
        return $this->hasMany(Group::class, ['account_id' => 'id'])->inverseOf('account');
    }

    /**
     * @return ActiveQuery
     */
    public function getUserAccounts(): ActiveQuery
    {
        return $this->hasMany(UserAccount::class, ['account_id' => 'id'])->inverseOf('account');
    }

    /**
     * {@inheritDoc}
     */
    public function delete(): int
    {
        return AccountState::updateAll(['status' => AccountState::STATUS_DELETED], ['id' => $this->id]);
    }

    /**
     * {@inheritDoc}
     */
    public static function deleteAll($condition = null, $params = []): int
    {
        $ids = self::find()->where($condition, $params)->select(['id'])->column();
        return AccountState::updateAll(['status' => AccountState::STATUS_DELETED], ['id' => $ids]);
    }

    /**
     * {@inheritDoc}
     */
    public function restore(): int
    {
        return AccountState::updateAll(['status' => AccountState::STATUS_ACTIVE], ['id' => $this->id]);
    }

    /**
     * {@inheritDoc}
     */
    public static function restoreAll($condition = null, $params = []): int
    {
        $ids = self::find()->where($condition, $params)->select(['id'])->column();
        return AccountState::updateAll(['status' => AccountState::STATUS_ACTIVE], ['id' => $ids]);
    }
}