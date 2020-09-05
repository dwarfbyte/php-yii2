<?php
namespace AmoCRMTech\Yii2\DI;

use AmoCRMTech\Yii2\Components\Client\ClientInterface;
use Closure;
use Yii;
use yii\base\InvalidConfigException;
use yii\di\ServiceLocator;

/**
 * @internal
 */
class ClientLocator extends ServiceLocator implements ClientLocatorInterface
{
    public ClientInterface $client;

    private array $_components  = [];
    private array $_definitions = [];

    public function __construct(ClientInterface $client, $config = [])
    {
        parent::__construct($config);
        $this->client = $client;
    }

    public function has($id, $checkInstance = false)
    {
        return $checkInstance ? isset($this->_components[$id]) : isset($this->_definitions[$id]);
    }

    public function get($id, $throwException = true)
    {
        if (isset($this->_components[$id])) {
            return $this->_components[$id];
        }

        if (isset($this->_definitions[$id])) {
            $definition = $this->_definitions[$id];
            if (is_object($definition) && !$definition instanceof Closure) {
                return $this->_components[$id] = $definition;
            }

            // pass client as first parameter
            return $this->_components[$id] = Yii::createObject($definition, [$this->client]);
        }

        if ($throwException) {
            throw new InvalidConfigException("Unknown component ID: $id");
        }

        return null;
    }

    public function set($id, $definition)
    {
        unset($this->_components[$id]);

        if ($definition === null) {
            unset($this->_definitions[$id]);
            return;
        }

        if (is_object($definition) || is_callable($definition, true)) {
            // an object, a class name, or a PHP callable
            $this->_definitions[$id] = $definition;
        } elseif (is_array($definition)) {
            // a configuration array
            if (isset($definition['__class'])) {
                $this->_definitions[$id]          = $definition;
                $this->_definitions[$id]['class'] = $definition['__class'];
                unset($this->_definitions[$id]['__class']);
            } elseif (isset($definition['class'])) {
                $this->_definitions[$id] = $definition;
            } else {
                throw new InvalidConfigException("The configuration for the \"$id\" component must contain a \"class\" element.");
            }
        } else {
            throw new InvalidConfigException("Unexpected configuration type for the \"$id\" component: " . gettype($definition));
        }
    }

    public function clear($id)
    {
        unset($this->_definitions[$id], $this->_components[$id]);
    }

    public function getComponents($returnDefinitions = true)
    {
        return $returnDefinitions ? $this->_definitions : $this->_components;
    }
}