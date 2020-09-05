<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Models\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Link extends ActiveRecord
{
    use ConnectionTrait {
        getDbAmo as getDb;
    }
}