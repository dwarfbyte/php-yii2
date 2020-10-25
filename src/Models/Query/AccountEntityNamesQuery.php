<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\AccountEntityNames;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\AccountEntityNames
 */
class AccountEntityNamesQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return AccountEntityNames[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return AccountEntityNames|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}