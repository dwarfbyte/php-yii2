<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\AccountDatetimeSettings;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\AccountDatetimeSettings
 */
class AccountDatetimeSettingsQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return AccountDatetimeSettings[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return AccountDatetimeSettings|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}