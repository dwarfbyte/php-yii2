<?php
namespace AmoCRMTech\Yii2\DI;

use AmoCRMTech\Yii2\Components\Client\ClientInterface;
use yii\di\ServiceLocator;

/**
 * @api
 * @mixin ServiceLocator
 */
interface ClientLocatorInterface
{
    public function __construct(ClientInterface $client, $config = []);
}