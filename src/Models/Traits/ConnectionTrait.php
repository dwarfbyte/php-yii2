<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Models\Traits;

use AmoCRMTech\Yii2\DI\ServiceLocatorInterface;
use Yii;
use yii\db\Connection;

/**
 * @internal
 */
trait ConnectionTrait
{
    public static function getDbAmo(): Connection
    {
        return Yii::createObject(ServiceLocatorInterface::class)->get('db');
    }
}