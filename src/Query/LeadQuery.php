<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Lead;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Lead
 */
class LeadQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Lead[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Lead|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}