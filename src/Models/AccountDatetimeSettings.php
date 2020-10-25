<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\AccountDatetimeSettingsQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id
 * @property string $date_pattern
 * @property string $short_date_pattern
 * @property string $short_time_pattern
 * @property string $date_format
 * @property string $time_format
 * @property string $timezone
 * @property string $timezone_offset
 *
 * @property-read Account $account
 */
class AccountDatetimeSettings extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return 'account_datetime_settings';
    }

    public static function find(): AccountDatetimeSettingsQuery
    {
        return new AccountDatetimeSettingsQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getAccount(): ActiveQuery
    {
        return $this->hasMany(Account::class, ['id' => 'account_id'])->inverseOf('datetimeSettings');
    }
}