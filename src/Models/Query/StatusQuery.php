<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\Status;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Status
 */
class StatusQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Status[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Status|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}