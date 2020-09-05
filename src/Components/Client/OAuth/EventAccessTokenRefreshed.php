<?php
namespace AmoCRMTech\Yii2\Components\Client\OAuth;

use yii\base\Event;
use yii\httpclient\Response;

class EventAccessTokenRefreshed extends Event
{
    public Request  $request;
    public Response $response;
    public array    $credentials;
}