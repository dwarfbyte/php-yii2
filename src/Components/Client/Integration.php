<?php
namespace AmoCRMTech\Yii2\Components\Client;

use yii\base\BaseObject;

class Integration extends BaseObject
{
    public string  $account_id;
    public string  $account_subdomain;
    public string  $redirect_uri;
    public string  $integration_id;
    public string  $secret_key;
}