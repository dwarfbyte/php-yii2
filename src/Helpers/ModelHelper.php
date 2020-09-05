<?php
namespace AmoCRMTech\Yii2\Helpers;

use AmoCRMTech\Yii2\Exceptions\InvalidModelException;
use Closure;
use Exception;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use function array_key_exists;
use function get_class;
use function gettype;
use function is_array;
use function is_callable;
use function is_object;

/**
 * @internal
 */
class ModelHelper
{
    /**
     * @param Model|array|callable $data
     * @param string               $class
     * @param array|null           $options = ['params' => [], 'scenario' => null, 'validate' => true, 'throw' => true]
     *
     * @return mixed user dynamicReturnTypeMeta.json instead
     * @throws InvalidConfigException
     * @throws InvalidModelException
     * @throws Exception
     */
    public static function ensure($data, string $class, ?array $options = [])
    {
        $params   = ArrayHelper::getValue($options, 'params', []);
        $scenario = ArrayHelper::getValue($options, 'scenario', null);
        $validate = ArrayHelper::getValue($options, 'validate', true);
        $throw    = ArrayHelper::getValue($options, 'throw', true);

        if ($data === null) {
            $data = [];
        }

        if ($data instanceof $class) {
            $model = $data;
            $scenario && $model->setScenario($scenario);
        } else {
            if ($data instanceof Closure || is_callable($data)) {
                $model = $data($options);
                $scenario && $model->setScenario($scenario);
            } else {
                if (is_array($data)) {
                    /** @var Model $model */
                    $model = Yii::createObject($class, $params);
                    $key   = array_key_exists($model->formName(), $data)
                        ? $model->formName()
                        : '';

                    $scenario && $model->setScenario($scenario);
                    $model->load($data, $key);
                } else {
                    $given = is_object($data)
                        ? get_class($data)
                        : gettype($data);

                    throw new InvalidConfigException("\$data is not an array or {$class} instance. {$given} given.");
                }
            }
        }

        /** @noinspection NotOptimalIfConditionsInspection */
        if ($validate && !$model->validate() && $throw) {
            throw new InvalidModelException($model);
        }

        /** @var mixed $model */
        return $model;
    }
}