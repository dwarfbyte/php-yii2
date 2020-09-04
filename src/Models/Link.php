<?php

namespace AmoCRMTech\Yii2\Models;

use AmoCRMTech\Yii2\Traits\ConnectionTrait;
use yii\db\ActiveRecord;

class Link extends ActiveRecord
{
    use ConnectionTrait {
        getLocatorDb as getDb;
    }
}