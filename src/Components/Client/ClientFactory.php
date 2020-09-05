<?php
/** @noinspection PhpUnused */

namespace AmoCRMTech\Yii2\Components\Client;

use AmoCRMTech\Yii2\Components\Client\cookies\Config as ConfigCookies;
use AmoCRMTech\Yii2\Components\Client\cookies\Request as RequestCookies;
use AmoCRMTech\Yii2\Components\Client\OAuth\Config as ConfigOAuth;
use AmoCRMTech\Yii2\Components\Client\OAuth\Request as RequestOAuth;
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
        return static function () use ($config) {
            return Yii::createObject([
                'class'         => Client::class,
                'transport'     => CurlTransport::class,
                'requestConfig' => [
                    'class'  => RequestOAuth::class,
                    'config' => $config,
                ],
            ]);
        };
    }

    /**
     * @param ConfigCookies|array $config
     *
     * @return Client
     */
    public static function buildCookies($config)
    {
        return self::lazyCookies($config)();
    }

    /**
     * @param ConfigCookies|array $config
     *
     * @return callable
     */
    public static function lazyCookies($config)
    {
        return static function () use ($config) {
            return Yii::createObject([
                'class'         => Client::class,
                'transport'     => CurlTransport::class,
                'requestConfig' => [
                    'class'  => RequestCookies::class,
                    'config' => $config,
                ],
            ]);
        };
    }
}