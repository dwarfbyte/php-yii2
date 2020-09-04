<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Tag;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Tag
 */
class TagQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Tag[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Tag|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}