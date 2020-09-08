<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\UserAccountQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
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
        getDbAmo as getDb;
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

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
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