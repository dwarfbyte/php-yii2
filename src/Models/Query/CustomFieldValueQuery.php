<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CustomFieldValue;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CustomFieldValue
 */
class CustomFieldValueQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CustomFieldValue[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CustomFieldValue|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}