<?php
/** @noinspection PhpInternalEntityUsedInspection,PhpUndefinedVariableInspection */

use AmoCRMTech\Yii2\Components\Client\Client;
use AmoCRMTech\Yii2\Components\Client\ClientInterface;
use AmoCRMTech\Yii2\DI\ClientLocator;
use AmoCRMTech\Yii2\DI\ClientLocatorInterface;
use AmoCRMTech\Yii2\DI\ServiceLocator;
use AmoCRMTech\Yii2\DI\ServiceLocatorInterface;

return (static function ($params) {
    if (!$params['amocrmtech.enabled']) {
        return [];
    }

    $config = [
        'container' => [
            'singletons'  => [
                ServiceLocatorInterface::class => [
                    'class'      => ServiceLocator::class,
                    'components' => $params['amocrmtech.definitions']
                ],
            ],
            'definitions' => [
                ClientLocatorInterface::class => ClientLocator::class,
                ClientInterface::class        => Client::class,
            ],
        ]
    ];

    if (is_array($params['amocrmtech.wrapper'])) {
        $config = array_reduce($params['amocrmtech.wrapper'], fn($carry, $item) => [$item => $carry], $config);
    }

    return $config;
})($params);