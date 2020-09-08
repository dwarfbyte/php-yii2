<?php
namespace AmoCRMTech\Yii2\Components\Client;

use yii\base\BaseObject;

class AccessToken extends BaseObject
{
    public string  $access_token;
    public string  $refresh_token;
    public ?int    $expires    = null;
    public ?int    $expires_in = null;
    public ?string $token_type = 'Bearer';
}