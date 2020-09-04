<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\NoteTypeQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

/**
 * @property int    $account_id  [bigint]
 * @property int    $id          [bigint]
 * @property string $code        [varchar(255)]
 * @property bool   $is_editable [boolean]
 * @property int    $deleted_at  [timestamp]
 */
class NoteType extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function tableName(): string
    {
        return '{{%note_type}}';
    }

    public static function primaryKey(): array
    {
        return ['account_id', 'id'];
    }

    public static function find(): NoteTypeQuery
    {
        return new NoteTypeQuery(static::class);
    }
}