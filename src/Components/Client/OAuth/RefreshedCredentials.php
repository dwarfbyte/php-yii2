<?php
namespace AmoCRMTech\Yii2\Components\Client\OAuth;

use yii\base\BaseObject;

class RefreshedCredentials extends BaseObject
{
    public string $access_token;
    public string $refresh_token;
    public string $token_type;
    public int    $expires_in;
}