<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\CustomField;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CustomField
 */
class CustomFieldQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CustomField[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CustomField|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}