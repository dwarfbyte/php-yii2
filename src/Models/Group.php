<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

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
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%group}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }

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

    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('groups');
    }

    public function getUserGroups()
    {
        return $this->hasMany(UserGroup::class, ['group_id' => 'id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->via('userGroups');
    }
}