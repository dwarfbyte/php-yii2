<?php
namespace AmoCRMTech\Yii2\Components\Client;

use yii\base\Event;

class EventAccessTokenRefreshed extends Event
{
    public AccessToken      $new;
    public AccessToken      $old;
    public IntegrationInfo  $integration;
}