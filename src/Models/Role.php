<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\RoleQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                $account_id [bigint]
 * @property int                $id         [bigint]
 * @property string             $name       [varchar(255)]
 * @property bool               $is_active  [boolean]
 * @property bool               $is_free    [boolean]
 * @property bool               $is_admin   [boolean]
 *
 * @property-read Account[]     $accounts
 * @property-read UserGroup[]   $userGroups
 * @property-read UserAccount[] $userAccounts
 */
class Role extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%role}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }

    public static function find(): RoleQuery
    {
        return new RoleQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getGroups(): ActiveQuery
    {
        return $this->hasMany(UserGroup::class, ['id' => 'group_id'])->via('userGroups');
    }

    public function getUserAccounts(): ActiveQuery
    {
        return $this->hasMany(UserAccount::class, ['user_id' => 'id'])->inverseOf('user');
    }

    public function getAccounts(): ActiveQuery
    {
        return $this->hasMany(Account::class, ['id' => 'account_id'])->via('userAccounts');
    }
}