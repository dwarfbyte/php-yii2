<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CustomFieldSettings;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CustomFieldSettings
 */
class CustomFieldSettingsQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CustomFieldSettings[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CustomFieldSettings|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}