<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\CatalogElement;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\CatalogElement
 */
class CatalogElementQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return CatalogElement[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return CatalogElement|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}