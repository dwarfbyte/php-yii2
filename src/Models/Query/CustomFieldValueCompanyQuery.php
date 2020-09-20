<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CustomFieldValueCompany;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CustomFieldValueCompany
 */
class CustomFieldValueCompanyQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CustomFieldValueCompany[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CustomFieldValueCompany|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}