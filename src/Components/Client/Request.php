<?php
/** @noinspection PhpMissingFieldTypeInspection */
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Components\Client;

use AmoCRMTech\Yii2\Helpers\ModelHelper;
use RuntimeException;
use Yii;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;
use yii\httpclient\CurlTransport;
use yii\httpclient\Response;

class Request extends \yii\httpclient\Request
{
    const EVENT_ACCESS_TOKEN_REFRESHED = 'accessTokenRefreshed';

    public $client;

    public RequestConfig $config;

    public function __construct($config = [])
    {
        parent::__construct(ArrayHelper::merge($config, [
            'config' => ModelHelper::ensure($config['config'], RequestConfig::class)
        ]));

        $this->client->baseUrl = "https://{$this->config->account_subdomain}.amocrm.ru/api/v4";
    }

    public function send()
    {
        $config = $this->config;
        $this->addHeaders(['Authorization' => "Bearer {$config->access_token}"]);

        $response = parent::send();

        if (!$response->isOk && (int)$response->statusCode === 401) {
            $this->refreshToken();
            $this->headers->remove('Authorization');
            $this->addHeaders(['Authorization' => "Bearer {$config->access_token}"]);
            $response = parent::send();
        }

        return $response;
    }

    protected function refreshToken()
    {
        $config = $this->config;
        $client = Yii::createObject([
            'class'     => Client::class,
            'baseUrl'   => "https://{$config->account_subdomain}.amocrm.ru",
            'transport' => CurlTransport::class,
        ]);

        $request = $client->post(['oauth2/access_token'], [
            'grant_type'    => 'refresh_token',
            'client_id'     => $config->integration_id,
            'client_secret' => $config->secret_key,
            'refresh_token' => $config->refresh_token,
            'redirect_uri'  => $config->redirect_uri,
        ]);

        $response = $request->send();

        if (!$response->isOk) {
            throw new RuntimeException("Error during access_token refreshing: {$response->content}");
        }
        if ($response->data['expires_in'] <= 0) {
            throw new RuntimeException("Token's expires_in parameter is below zero");
        }

        $config->access_token  = $response->data['access_token'];
        $config->refresh_token = $response->data['refresh_token'];

        $event = $this->buildEvent($response);

        if (is_callable($this->config->on_refresh)) {
            Yii::$container->invoke($this->config->on_refresh, [$event]);
        }

        $this->trigger(self::EVENT_ACCESS_TOKEN_REFRESHED, $event);
    }

    private function buildEvent(Response $response): EventAccessTokenRefreshed
    {
        $new = new AccessToken([
            'access_token'  => $response->data['access_token'],
            'refresh_token' => $response->data['refresh_token'],
            'token_type'    => $response->data['token_type'],
            'expires_in'    => $response->data['expires_in'],
            'expires'       => time() + $response->data['expires_in'],
        ]);

        $old = new AccessToken([
            'access_token'  => $this->config->access_token,
            'refresh_token' => $this->config->refresh_token
        ]);

        $integration = new Integration([
            'account_subdomain' => $this->config->account_subdomain,
            'account_id'        => $this->config->account_id,
            'redirect_uri'      => $this->config->redirect_uri,
            'integration_id'    => $this->config->integration_id,
            'secret_key'        => $this->config->secret_key,
        ]);

        return new EventAccessTokenRefreshed([
            'new'         => $new,
            'old'         => $old,
            'integration' => $integration,
        ]);
    }
}