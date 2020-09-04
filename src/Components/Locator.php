<?php /** @noinspection PhpUnhandledExceptionInspection */
namespace AmoCRMTech\Yii2\Components;

use Yii;
use yii\di\ServiceLocator;

class Locator extends ServiceLocator implements LocatorInterface
{
    private string $context = 'default';

    public function get($id, $throwException = true, ?string $context = null)
    {
        $serviceId = $this->serviceId($id, $context);
        if (!$this->has($serviceId)) {
            $definition = $this->buildDefinition($id, $context);
            $this->set($serviceId, $definition);
        }

        return parent::get($serviceId, $throwException);
    }

    public function clear($id, ?string $context = null): void
    {
        parent::clear($this->serviceId($id, $context));
    }

    public function with(string $context, callable $function)
    {
        $previous = $this->context($context);

        $this->context = $context;

        $result = Yii::$container->invoke($function, [$this]);

        $this->context = $previous;

        return $result;
    }

    private function serviceId(string $id, ?string $context = null): string
    {
        return "{$this->context($context)}_{$id}";
    }

    private function buildDefinition(string $id, ?string $context = null)
    {
        $definitions = $this->getComponents();
        if (!array_key_exists($id, $definitions)) {
            return null;
        }

        $context    = $this->context($context);
        $definition = $definitions[$id];
        if (is_array($definition)) {
            return $definition;
        }

        if (is_callable($definition)) {
            return Yii::$container->invoke($definition, [$context]);
        }

        return $definition;
    }

    private function context(?string $context = null): string
    {
        return $context ?? $this->context;
    }
}