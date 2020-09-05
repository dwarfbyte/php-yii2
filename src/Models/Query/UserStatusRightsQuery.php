<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\UserStatusRights;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\UserStatusRights
 */
class UserStatusRightsQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return UserStatusRights[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return UserStatusRights|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}