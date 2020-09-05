<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\UserAccountRights;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\UserAccountRights
 */
class UserAccountRightsQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return UserAccountRights[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return UserAccountRights|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}