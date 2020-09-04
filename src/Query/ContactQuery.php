<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Contact;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Contact
 */
class ContactQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Contact[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Contact|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}