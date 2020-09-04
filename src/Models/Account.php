<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\AccountQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $id              [bigint]
 * @property string             $name            [varchar(255)]
 * @property string             $subdomain       [varchar(255)]
 * @property string             $currency        [varchar(255)]
 * @property string             $timezone        [varchar(255)]
 * @property string             $timezone_offset [varchar(255)]
 * @property string             $language        [varchar(255)]
 * @property string             $date_pattern    [jsonb]
 * @property int                $current_user    [bigint]
 *
 * @property-read Pipeline[]    $pipelines
 * @property-read Status[]      $statuses
 * @property-read Group[]       $groups
 * @property-read User[]        $users
 * @property-read UserAccount[] $userAccounts
 */
class Account extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%account}}';
    }

    public static function find(): AccountQuery
    {
        return new AccountQuery(static::class);
    }

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

    public function getPipelines(): ActiveQuery
    {
        return $this->hasMany(Pipeline::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getStatuses(): ActiveQuery
    {
        return $this->hasMany(Status::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getGroups(): ActiveQuery
    {
        return $this->hasMany(Group::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getUserAccounts(): ActiveQuery
    {
        return $this->hasMany(UserAccount::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->via('userAccounts');
    }
}