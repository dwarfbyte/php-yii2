<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Company;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Company
 */
class CompanyQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Company[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Company|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}