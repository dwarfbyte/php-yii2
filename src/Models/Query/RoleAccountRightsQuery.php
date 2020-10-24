<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\RoleAccountRights;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\RoleAccountRights
 */
class RoleAccountRightsQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return RoleAccountRights[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return RoleAccountRights|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}