<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\UserAccountQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int           $user_id    [bigint]
 * @property int           $account_id [bigint]
 * @property bool          $is_active  [boolean]
 * @property bool          $is_free    [boolean]
 * @property bool          $is_admin   [boolean]
 *
 * @property-read  Account $account
 * @property-read  User    $user
 */
class UserAccount extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%user_account}}';
    }

    public static function primaryKey(): array
    {
        return ['user_id', 'account_id'];
    }

    public static function find(): UserAccountQuery
    {
        return new UserAccountQuery(static::class);
    }

    public function rules()
    {
        return [
            ['user_id', 'exist', 'targetRelation' => 'user'],
            ['account_id', 'exist', 'targetRelation' => 'account'],

            ['is_active', 'boolean'],
            ['is_active', 'required'],

            ['is_admin', 'boolean'],
            ['is_admin', 'required'],

            ['is_free', 'boolean'],
            ['is_free', 'required'],
        ];
    }

    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('userAccounts');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id'])->inverseOf('userAccounts');
    }
}