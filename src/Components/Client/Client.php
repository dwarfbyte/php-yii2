<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Components\Client;

use AmoCRMTech\Yii2\DI\ClientLocatorInterface;
use Yii;

/**
 * @internal
 */
class Client extends \yii\httpclient\Client implements ClientInterface
{
    public ClientLocatorInterface $locator;

    public array $components = [];

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->locator = Yii::createObject([
            'class'      => ClientLocatorInterface::class,
            'components' => $this->components,
        ], [$this]);
    }

    public function __get($name)
    {
        if ($this->locator->has($name)) {
            return $this->locator->get($name);
        }

        return parent::__get($name);
    }
}