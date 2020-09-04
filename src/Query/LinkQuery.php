<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Link;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Link
 */
class LinkQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Link[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Link|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}