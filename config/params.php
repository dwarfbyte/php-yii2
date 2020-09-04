<?php

use yii\db\Connection;

return [
    'amocrmtech.enabled'     => true,
    'amocrmtech.wrapper'     => null,
    'amocrmtech.locator'     => 'amocrmtech_locator',
    'amocrmtech.definitions' => [
        'default_db' => [ // todo non-flat list sounds bad?
            'class'    => Connection::class,
            'dsn'      => 'pgsql:host=pgsql.amocrmtech.it;dbname=amocrmtech__account_000000;port=5432',
            'username' => 'postgres',
            'password' => '',
            'charset'  => 'utf8',
        ]
    ],
];