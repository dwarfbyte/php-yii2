<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\AccountQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int                          $id
 * @property string                       $name
 * @property string                       $subdomain
 * @property string                       $created_at
 * @property string                       $created_by
 * @property string                       $updated_at
 * @property string                       $updated_by
 * @property string                       $current_user_id
 * @property string                       $country
 * @property string                       $currency
 * @property string                       $customers_mode
 * @property string                       $is_unsorted_on
 * @property string                       $mobile_feature_version
 * @property string                       $is_loss_reason_enabled
 * @property string                       $is_helpbot_enabled
 * @property string                       $is_technical_account
 * @property string                       $contact_name_display_order
 * @property string                       $version
 *
 * @property-read Pipeline[]              $pipelines
 * @property-read Status[]                $statuses
 * @property-read UserGroup[]             $userGroups
 * @property-read AccountDatetimeSettings $datetimeSettings
 * @property-read AccountEntityNames      $entityNames
 * @property-read User[]                  $users
 * @property-read UserAccount[]           $userAccounts
 */
class Account extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'account';
    }

    public static function find(): AccountQuery
    {
        return new AccountQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getPipelines(): ActiveQuery
    {
        return $this->hasMany(Pipeline::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getStatuses(): ActiveQuery
    {
        return $this->hasMany(Status::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getUserGroups(): ActiveQuery
    {
        return $this->hasMany(UserGroup::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getUserAccounts(): ActiveQuery
    {
        return $this->hasMany(UserAccount::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->via('userAccounts');
    }

    public function getEntityNames(): ActiveQuery
    {
        return $this->hasOne(AccountEntityNames::class, ['account_id' => 'id'])->inverseOf('account');
    }

    public function getDatetimeSettings(): ActiveQuery
    {
        return $this->hasOne(AccountDatetimeSettings::class, ['account_id' => 'id'])->inverseOf('account');
    }

}