<?php
/** @noinspection PhpMissingFieldTypeInspection */
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Components\Client\Cookies;

use AmoCRMTech\Yii2\Helpers\ModelHelper;
use RuntimeException;
use Yii;
use yii\helpers\FileHelper;
use yii\httpclient\Client;
use yii\httpclient\CurlTransport;

class Request extends \yii\httpclient\Request
{
    const EVENT_COOKIES_REFRESHED = 'cookiesRefreshed';

    public $client;

    public Config $config;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->config = ModelHelper::ensure($this->config, Config::class);

        $this->client->baseUrl = "https://{$this->config->subdomain}.amocrm.ru/api/v4";
    }

    public function send()
    {
        $this->addOptions(['cookieFile' => $this->config->cookiesFile]);

        $response = parent::send();

        if ((int)$response->statusCode === 401) {
            $this->refreshCookies();
            $response = parent::send();
        }

        return $response;
    }

    protected function refreshCookies()
    {
        $config = $this->config;
        $client = Yii::createObject([
            'class'     => Client::class,
            'baseUrl'   => "https://{$config->subdomain}.amocrm.ru",
            'transport' => CurlTransport::class,
        ]);

        $request = $client->post(['private/api/auth.php', 'type' => 'json'], [
            'USER_LOGIN' => $config->login,
            'USER_HASH'  => $config->token,
        ]);

        FileHelper::createDirectory(dirname($config->cookiesFile));
        $request->addOptions(['cookieJar' => $config->cookiesFile]);

        $response = $request->send();
        if (!$response->isOk) {
            throw new RuntimeException("Error during cookies refreshing: {$response->content}");
        }

        $this->trigger(self::EVENT_COOKIES_REFRESHED, new EventCookiesRefreshed([
            'request'  => $this,
            'response' => $response,
            'file'     => $config->cookiesFile,
        ]));
    }
}