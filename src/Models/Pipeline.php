<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\PipelineQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int           $id         [bigint]
 * @property int           $account_id [bigint]
 * @property string        $name       [varchar(255)]
 * @property string        $sort       [integer]
 * @property bool          $is_main    [boolean]
 * @property int           $deleted_at [timestamp]
 *
 * @property-read Account  $account
 * @property-read Status[] $statuses
 */
class Pipeline extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function tableName(): string
    {
        return '{{%pipeline}}';
    }

    public static function primaryKey(): array
    {
        return ['id'];
    }

    public static function find(): PipelineQuery
    {
        return new PipelineQuery(static::class);
    }

    public function rules(): array
    {
        return array_map(fn($attr) => [$attr, 'safe'], $this->attributes());
    }

    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('pipelines');
    }

    public function getStatuses()
    {
        return $this->hasMany(Status::class, ['pipeline_id' => 'id'])->inverseOf('pipeline');
    }
}