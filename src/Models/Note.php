<?php
namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Query\NoteQuery;
use AmoCRMTech\Yii2\Traits\ConnectionTrait;

class Note
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }

    public static function find(): NoteQuery
    {
        return new NoteQuery(static::class);
    }
}