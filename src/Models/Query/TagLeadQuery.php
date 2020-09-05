<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\TagLead;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\TagLead
 */
class TagLeadQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return TagLead[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return TagLead|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}