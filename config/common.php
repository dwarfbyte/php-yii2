<?php
/** @noinspection PhpUndefinedVariableInspection */

use AmoCRMTech\Yii2\Components\Locator;
use AmoCRMTech\Yii2\Components\LocatorInterface;

return (static function ($params) {
    if (!$params['amocrmtech.enabled']) {
        return [];
    }

    $config = [
        'container'  => [
            'singletons' => [
                LocatorInterface::class => Locator::class
            ]
        ],
        'components' => [
            $params['amocrmtech.locator'] => [
                'class'      => LocatorInterface::class,
                'components' => $params['amocrmtech.definitions']
            ]
        ]
    ];

    if (is_array($params['amocrmtech.wrapper'])) {
        $config = array_reduce($params['amocrmtech.wrapper'], fn($carry, $item) => [$item => $carry], $config);
    }

    return $config;
})($params);