<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CustomFieldValueContact;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CustomFieldValueContact
 */
class CustomFieldValueContactQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CustomFieldValueContact[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CustomFieldValueContact|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}