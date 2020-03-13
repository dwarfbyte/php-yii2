<?php

namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int              $account_id [bigint]
 * @property int              $id         [bigint]
 * @property string           $name       [varchar(255)]
 * @property int              $deleted_at [timestamp]
 *
 * @property-read User[]      $users
 * @property-read UserGroup[] $userGroups
 * @property-read Account     $account
 */
class Group extends ActiveRecord
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
        return '{{%group}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['account_id', 'id'];
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            ['account_id', 'exist', 'targetRelation' => 'account'],
            ['account_id', 'required'],

            ['id', 'integer'],
            ['id', 'required'],

            ['name', 'string'],
            ['deleted_at', 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('groups');
    }

    /**
     * @return ActiveQuery
     */
    public function getUserGroups()
    {
        return $this->hasMany(UserGroup::class, ['group_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->via('userGroups');
    }
}