<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\StatusQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
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
        getLocatorDb as getDb;
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

    public function rules()
    {
        return [
            ['account_id', 'exist', 'targetRelation' => 'account'],
            ['account_id', 'required'],

            ['pipeline_id', 'exist', 'targetRelation' => 'pipeline'],
            ['pipeline_id', 'required'],

            ['id', 'integer'],
            ['id', 'required'],

            ['name', 'string'],
            ['color', 'string'],
            ['sort', 'integer'],
            ['is_editable', 'boolean'],
            ['deleted_at', 'safe'],
        ];
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