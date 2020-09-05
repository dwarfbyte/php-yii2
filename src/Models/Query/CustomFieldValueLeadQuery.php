<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CustomFieldValueLead;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CustomFieldValueLead
 */
class CustomFieldValueLeadQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CustomFieldValueLead[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CustomFieldValueLead|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}