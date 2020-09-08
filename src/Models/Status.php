<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\StatusQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int           $account_id  [bigint]
 * @property int           $pipeline_id [bigint]
 * @property int           $id          [bigint]
 * @property string        $name        [varchar(255)]
 * @property string        $color       [varchar(255)]
 * @property string        $sort        [integer]
 * @property bool          $is_editable [boolean]
 * @property int           $deleted_at  [timestamp]
 *
 * @property-read Account  $account
 * @property-read Pipeline $pipeline
 */
class Status extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%status}}';
    }

    public static function primaryKey(): array
    {
        return ['pipeline_id', 'id'];
    }

    public static function find(): StatusQuery
    {
        return new StatusQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('statuses');
    }

    public function getPipeline()
    {
        return $this->hasOne(Pipeline::class, ['id' => 'pipeline_id'])->inverseOf('statuses');
    }
}