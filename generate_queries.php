<?php

$template = <<<'TXT'
<?php
namespace AmoCRMTech\Yii2\Query;

use {model_fqn};
use yii\db\ActiveQuery;

/**
 * @see \{model_fqn}
 */
class {query_name} extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return {model_name}[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return {model_name}|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
TXT;

foreach (glob(__DIR__ . '/src/Models/*.php') as $item) {
    $modelName = pathinfo($item, PATHINFO_FILENAME);
    $modelFqn  = "AmoCRMTech\\Yii2\\Models\\{$modelName}";

    $queryName = "{$modelName}Query";
    $queryFqn  = "AmoCRMTech\\Yii2\\Query\\{$queryName}";
    $queryPath = __DIR__ . "/src/Query/{$queryName}.php";

    $content = strtr($template, [
        '{model_name}' => $modelName,
        '{model_fqn}'  => $modelFqn,
        '{query_name}' => $queryName,
    ]);

    file_put_contents($queryPath, $content);
}