<?php
/** @noinspection PhpUnhandledExceptionInspection */

namespace AmoCRMTech\Yii2\Exceptions;

use Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\HttpException;

/**
 * @internal
 */
class InvalidModelException extends HttpException
{
    public Model $model;

    public function __construct(Model $model, $message = null, $code = 0, Exception $previous = null)
    {
        $this->model = $model;
        $message     = $message ?? $this->getDefaultMessage();
        parent::__construct(400, $message, $code, $previous);
    }

    public function getDefaultMessage(): string
    {
        $error = Json::errorSummary($this->model);
        $error = Json::decode($error);
        $error = Json::encode($error, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        $class = get_class($this->model);
        $trace = '';

        if (YII_DEBUG) {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            $trace = ArrayHelper::getValue($trace, '2.file') . ': ' . ArrayHelper::getValue($trace, '2.line');
        }

        $message = implode("\n", array_filter([
            "Model {$class} is invalid:",
            $error,
            $trace,
        ]));

        return trim($message);
    }

    public function getName(): string
    {
        return 'Model is invalid';
    }
}