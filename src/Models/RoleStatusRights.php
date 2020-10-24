<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\RoleStatusRightsQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int           $role_id     [bigint]
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
class RoleStatusRights extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%user_status_rights}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'role_id', 'pipeline_id', 'status_id'];
    }

    public static function find(): RoleStatusRightsQuery
    {
        return new RoleStatusRightsQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getRole(): ActiveQuery
    {
        return $this->hasOne(Role::class, ['id' => 'user_id'])->inverseOf('roleStatusRights');
    }

    public function getAccount(): ActiveQuery
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('roleStatusRights');
    }

    public function getPipeline(): ActiveQuery
    {
        return $this->hasOne(Pipeline::class, ['id' => 'pipeline_id'])->inverseOf('roleStatusRights');
    }

    public function getStatus(): ActiveQuery
    {
        return $this->hasOne(Status::class, ['id' => 'status_id'])->inverseOf('roleStatusRights');
    }
}