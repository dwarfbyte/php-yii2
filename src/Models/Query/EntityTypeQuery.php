<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\EntityType;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\EntityType
 */
class EntityTypeQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return EntityType[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return EntityType|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}