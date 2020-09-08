<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

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
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%user_status_rights}}';
    }

    public static function primaryKey(): array
    {
        return ['user_id', 'account_id', 'pipeline_id', 'status_id'];
    }

    public static function find(): UserStatusRights
    {
        return new UserStatusRights(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id'])->inverseOf('userAccountRights');
    }

    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('userAccountRights');
    }

    public function getPipeline()
    {
        return $this->hasOne(Pipeline::class, ['id' => 'pipeline_id'])->inverseOf('userAccountRights');
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id'])->inverseOf('userAccountRights');
    }
}