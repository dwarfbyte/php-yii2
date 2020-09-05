<?php
namespace AmoCRMTech\Yii2\Components\Client\Cookies;

use yii\base\Event;
use yii\httpclient\Response;

class EventCookiesRefreshed extends Event
{
    public Request  $request;
    public Response $response;
    public string   $file;
}