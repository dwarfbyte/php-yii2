<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int           $user_id     [bigint]
 * @property int           $account_id  [bigint]
 * @property int           $pipeline_id [bigint]
 * @property int           $status_id   [bigint]
 * @property string        $view        [char]
 * @property string        $edit        [char]
 * @property string        $delete      [char]
 * @property string        $export      [char]
 *
 * @property-read User     $user
 * @property-read Account  $account
 * @property-read Pipeline $pipeline
 * @property-read Status   $status
 */
class UserStatusRights extends ActiveRecord
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
        return '{{%user_status_rights}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['user_id', 'account_id', 'pipeline_id', 'status_id'];
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            ['user_id', 'exist', 'targetRelation' => 'user'],
            ['user_id', 'required'],

            ['account_id', 'exist', 'targetRelation' => 'account'],
            ['account_id', 'required'],

            ['pipeline_id', 'exist', 'targetRelation' => 'pipeline'],
            ['pipeline_id', 'required'],

            ['status_id', 'exist', 'targetRelation' => 'status'],
            ['status_id', 'required'],

            ['view', 'string'],
            ['view', 'required'],

            ['edit', 'string'],
            ['edit', 'required'],

            ['delete', 'string'],
            ['delete', 'required'],

            ['export', 'string'],
            ['export', 'required'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id'])->inverseOf('userAccountRights');
    }

    /**
     * @return ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('userAccountRights');
    }

    /**
     * @return ActiveQuery
     */
    public function getPipeline()
    {
        return $this->hasOne(Pipeline::class, ['id' => 'pipeline_id'])->inverseOf('userAccountRights');
    }

    /**
     * @return ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id'])->inverseOf('userAccountRights');
    }
}