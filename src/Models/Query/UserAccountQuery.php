<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\UserAccount;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\UserAccount
 */
class UserAccountQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return UserAccount[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return UserAccount|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}