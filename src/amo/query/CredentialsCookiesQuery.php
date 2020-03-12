<?php /** @noinspection SenselessProxyMethodInspection,ReturnTypeCanBeDeclaredInspection */

namespace amocrmtech\models\ar\amo\query;

use amocrmtech\models\ar\amo\CredentialsCookies;
use yii\db\ActiveQuery;

/**
 * @see \amocrmtech\models\ar\amo\CredentialsCookies
 */
class CredentialsCookiesQuery extends ActiveQuery
{
    /**
     * @return CredentialsCookiesQuery
     */
    public function active()
    {
        // todo modify query on prepare stage
        return $this->andWhere(['is', '[[deleted_at]]', null]);
    }

    /**
     * {@inheritdoc}
     * @return CredentialsCookies[]|array
     */
    public function all($db = null):array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CredentialsCookies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
