<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\TagCompany;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\TagCompany
 */
class TagCompanyQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return TagCompany[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return TagCompany|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}