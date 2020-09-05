<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\Group;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Group
 */
class GroupQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Group[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Group|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}