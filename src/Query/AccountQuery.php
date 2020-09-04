<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Account;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Account
 */
class AccountQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Account[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Account|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}