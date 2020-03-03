<?php

use yii\db\Connection;

return [
    'amocrmtech.models.ar.enabled'       => true,
    'amocrmtech.models.ar.locator'       => 'amocrmtech_locator',
    'amocrmtech.models.ar.app.db'        => 'amocrmtech_db_app',
    'amocrmtech.models.ar.app.db.config' => [
        'class'    => Connection::class,
        'dsn'      => 'pgsql:host=localhost;dbname=amocrmtech__server__app;port=5432',
        'username' => 'postgres',
        'password' => '',
        'charset'  => 'utf8',
    ],
    'amocrmtech.models.ar.amo.db'        => 'amocrmtech_db_amo',
    'amocrmtech.models.ar.amo.db.config' => [
        'class'    => Connection::class,
        'dsn'      => 'pgsql:host=localhost;dbname=amocrmtech__server__account_{id};port=5432',
        'username' => 'postgres',
        'password' => '',
        'charset'  => 'utf8',
    ],
];