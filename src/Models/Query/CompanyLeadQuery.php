<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CompanyLead;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CompanyLead
 */
class CompanyLeadQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CompanyLead[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CompanyLead|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}