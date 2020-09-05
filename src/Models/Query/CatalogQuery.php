<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\Catalog;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Catalog
 */
class CatalogQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Catalog[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Catalog|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}