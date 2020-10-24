<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\Role;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Role
 */
class RoleQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Role[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Role|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}