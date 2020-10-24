<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\RoleAccountRightsQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int          $role_id        [bigint]
 * @property int          $account_id     [bigint]
 * @property string       $incoming_leads [char]
 * @property string       $catalogs       [char]
 * @property string       $lead_add       [char]
 * @property string       $lead_view      [char]
 * @property string       $lead_edit      [char]
 * @property string       $lead_delete    [char]
 * @property string       $lead_export    [char]
 * @property string       $contact_add    [char]
 * @property string       $contact_view   [char]
 * @property string       $contact_edit   [char]
 * @property string       $contact_delete [char]
 * @property string       $contact_export [char]
 * @property string       $company_add    [char]
 * @property string       $company_view   [char]
 * @property string       $company_edit   [char]
 * @property string       $company_delete [char]
 * @property string       $company_export [char]
 * @property string       $task_edit      [char]
 * @property string       $task_delete    [char]
 *
 * @property-read User    $user
 * @property-read Account $account
 */
class RoleAccountRights extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%role_account_rights}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'role_id'];
    }

    public static function find(): RoleAccountRightsQuery
    {
        return new RoleAccountRightsQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id'])->inverseOf('roleAccountRights');
    }

    public function getAccount(): ActiveQuery
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('roleAccountRights');
    }
}