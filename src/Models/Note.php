<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Query\NoteQuery;
use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;

class Note
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }

    public static function find(): NoteQuery
    {
        return new NoteQuery(static::class);
    }
}