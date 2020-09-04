<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Task;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Task
 */
class TaskQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Task[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Task|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}