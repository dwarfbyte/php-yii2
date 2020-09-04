<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Traits;

use AmoCRMTech\Yii2\Components\LocatorInterface;
use Yii;
use yii\db\Connection;

trait ConnectionTrait
{
    public static function getLocatorDb(): Connection
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return Yii::createObject(LocatorInterface::class)->get('db');
    }
}