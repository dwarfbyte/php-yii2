<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\TaskType;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\TaskType
 */
class TaskTypeQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return TaskType[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return TaskType|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}