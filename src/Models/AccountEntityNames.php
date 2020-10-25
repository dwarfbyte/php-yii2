<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\AccountEntityNamesQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int   $account_id
 * @property array $leads
 *
 * @property-read Account $account
 */
class AccountEntityNames extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'account_entity_names';
    }

    public static function find(): AccountEntityNamesQuery
    {
        return new AccountEntityNamesQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getAccount(): ActiveQuery
    {
        return $this->hasMany(Account::class, ['id' => 'account_id'])->inverseOf('entityNames');
    }
}