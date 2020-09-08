<?php
/** @noinspection PhpUnused */

namespace AmoCRMTech\Yii2\Components\Client;

use AmoCRMTech\Yii2\Components\Client\Request as RequestOAuth;
use AmoCRMTech\Yii2\Components\Client\RequestConfig as ConfigOAuth;
use Yii;
use yii\httpclient\CurlTransport;

class ClientFactory
{
    /**
     * @param ConfigOAuth|array $config
     *
     * @return Client
     */
    public static function buildOAuth($config)
    {
        return self::lazyOAuth($config)();
    }

    /**
     * @param ConfigOAuth|array $config
     *
     * @return callable
     */
    public static function lazyOAuth($config)
    {
        return fn() => Yii::createObject([
            'class'         => ClientInterface::class,
            'transport'     => CurlTransport::class,
            'requestConfig' => [
                'class'  => RequestOAuth::class,
                'config' => $config,
            ],
        ]);
    }
}