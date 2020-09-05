<?php
namespace PHPSTORM_META {

    override(\AmoCRMTech\Yii2\DI\ServiceLocatorInterface::get(), map([
        "db"     => \yii\db\Connection::class,
        "client" => \AmoCRMTech\Yii2\Components\Client\ClientInterface::class,
    ]));
}