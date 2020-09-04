<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Element;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Element
 */
class ElementQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Element[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Element|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}