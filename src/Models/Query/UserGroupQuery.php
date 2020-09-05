<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\UserGroup;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\UserGroup
 */
class UserGroupQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return UserGroup[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return UserGroup|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}