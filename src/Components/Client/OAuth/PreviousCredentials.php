<?php
namespace AmoCRMTech\Yii2\Components\Client\OAuth;

use yii\base\BaseObject;

class PreviousCredentials extends BaseObject
{
    public ?string $access_token = null;

    public string $account_subdomain;
    public string $refresh_token;
    public string $redirect_uri;
    public string $integration_id;
    public string $secret_key;
}