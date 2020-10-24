<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\RoleStatusRights;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\RoleStatusRights
 */
class RoleStatusRightsQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return RoleStatusRights[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return RoleStatusRights|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}