<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\UserQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/** @noinspection PropertiesInspection */

/**
 * @property int                $id           [bigint]
 * @property string             $name         [varchar(255)]
 * @property string             $last_name    [varchar(255)]
 * @property string             $login        [varchar(255)]
 * @property string             $language     [varchar(255)]
 * @property string             $phone_number [varchar(255)]
 *
 * @property-read Group[]       $groups
 * @property-read Account[]     $accounts
 * @property-read UserGroup[]   $userGroups
 * @property-read UserAccount[] $userAccounts
 */
class User extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%user}}';
    }

    public static function primaryKey(): array
    {
        return ['id'];
    }

    public static function find(): UserQuery
    {
        return new UserQuery(static::class);
    }

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['id', 'unique'],
            ['id', 'required'],

            ['login', 'string'],
            ['login', 'unique'],
            ['login', 'required'],

            ['name', 'string'],
            ['last_name', 'string'],
            ['language', 'string'],
        ];
    }

    public function getUserGroups()
    {
        return $this->hasMany(UserGroup::class, ['user_id' => 'id']);
    }

    public function getGroups()
    {
        return $this->hasMany(Group::class, ['id' => 'group_id'])->via('userGroups');
    }

    public function getUserAccounts()
    {
        return $this->hasMany(UserAccount::class, ['user_id' => 'id'])->inverseOf('user');
    }

    public function getAccounts()
    {
        return $this->hasMany(Account::class, ['id' => 'account_id'])->via('userAccounts');
    }
}