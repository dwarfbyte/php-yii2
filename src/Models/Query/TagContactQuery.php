<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\TagContact;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\TagContact
 */
class TagContactQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return TagContact[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return TagContact|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}