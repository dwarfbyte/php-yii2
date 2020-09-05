<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\Pipeline;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Pipeline
 */
class PipelineQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Pipeline[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Pipeline|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}