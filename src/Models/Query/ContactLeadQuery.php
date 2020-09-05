<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\ContactLead;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\ContactLead
 */
class ContactLeadQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return ContactLead[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return ContactLead|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}