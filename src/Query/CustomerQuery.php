<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Customer;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Customer
 */
class CustomerQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Customer[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Customer|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}