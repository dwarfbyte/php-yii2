<?php
namespace AmoCRMTech\Yii2\Models\Query;

use AmoCRMTech\Yii2\Models\User;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\User
 */
class UserQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return User[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return User|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}