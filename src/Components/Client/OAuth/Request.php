<?php
/** @noinspection PhpMissingFieldTypeInspection */
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Components\Client\OAuth;

use AmoCRMTech\Yii2\Helpers\ModelHelper;
use RuntimeException;
use Yii;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\httpclient\CurlTransport;

class Request extends \yii\httpclient\Request
{
    const EVENT_ACCESS_TOKEN_REFRESHED = 'accessTokenRefreshed';

    public $client;

    public Config $config;

    public function __construct($config = [])
    {
        parent::__construct(ArrayHelper::merge($config, [
            'config' => ModelHelper::ensure($config['config'], Config::class)
        ]));

        $this->client->baseUrl = "https://{$this->config->subdomain}.amocrm.ru/api/v4";
    }

    public function send()
    {
        $config = $this->config;
        $this->addHeaders(['Authorization' => "Bearer {$config->accessToken}"]);

        $response = parent::send();

        if (!$response->isOk && $response->statusCode === 401) {
            $this->refreshCredentials();
            $this->headers->remove('Authorization');
            $this->addHeaders(['Authorization' => "Bearer {$config->accessToken}"]);
            $response = parent::send();
        }

        return $response;
    }

    protected function refreshCredentials()
    {
        $config = $this->config;
        $client = Yii::createObject([
            'class'     => Client::class,
            'baseUrl'   => "https://{$config->subdomain}.amocrm.ru",
            'transport' => CurlTransport::class,
        ]);

        $request = $client->post(['oauth2/access_token'], [
            'grant_type'    => 'refresh_token',
            'client_id'     => $config->integrationId,
            'client_secret' => $config->secretKey,
            'refresh_token' => $config->refreshToken,
            'redirect_uri'  => $config->redirectUri,
        ]);

        $response = $request->send();

        if (!$response->isOk) {
            throw new RuntimeException("Error during access_token refreshing: {$response->content}");
        }
        if ($response->data['expires_in'] <= 0) {
            throw new RuntimeException("Token's expires_in parameter is below zero");
        }

        $config->accessToken = $response->data['access_token'];

        $this->trigger(self::EVENT_ACCESS_TOKEN_REFRESHED, new EventAccessTokenRefreshed([
            'request'     => $this,
            'response'    => $response,
            'credentials' => $response->data,
        ]));
    }
}