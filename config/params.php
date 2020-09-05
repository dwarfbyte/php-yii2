<?php

use AmoCRMTech\Yii2\Components\Client\ClientFactory;
use yii\db\Connection;

return [
    'amocrmtech.enabled'     => true,
    'amocrmtech.wrapper'     => null,
    'amocrmtech.locator'     => 'amocrmtech_locator',
    'amocrmtech.definitions' => [
        'default_db'     => [
            'class'    => Connection::class,
            'dsn'      => 'pgsql:host=pgsql.amocrmtech.it;dbname=amocrmtech__account_000000;port=5432',
            'username' => 'postgres',
            'password' => '',
            'charset'  => 'utf8',
        ],
        'default_client' => fn() => ClientFactory::buildOAuth([
            'subdomain'     => 'your_subdomain',
            'refreshToken'  => 'your_refresh_token',
            'redirectUri'   => 'your_redirect_uri',
            'integrationId' => 'your_integration_id',
            'secretKey'     => 'your_secret_key',
        ]),
    ],
];