<?php /** @noinspection PhpUndefinedVariableInspection */

use amocrmtech\base\locator\ContextualServiceLocator;

return [
    'components' => array_filter($params['amocrmtech.models.ar.enabled']
        ? [
            $params['amocrmtech.models.ar.locator'] => [
                'class'      => ContextualServiceLocator::class,
                'components' => [
                    $params['amocrmtech.models.ar.amo.db'] => $params['amocrmtech.models.ar.amo.db.config'],
                ],
            ],
            $params['amocrmtech.models.ar.app.db']  => $params['amocrmtech.models.ar.app.db.config'],
        ]
        : []
    ),
];