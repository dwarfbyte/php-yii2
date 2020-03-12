<?php /** @noinspection SenselessProxyMethodInspection,ReturnTypeCanBeDeclaredInspection */

namespace amocrmtech\models\ar\amo\query;

use amocrmtech\models\ar\amo\CredentialsOAuth;
use yii\db\ActiveQuery;

/**
 * @see \amocrmtech\models\ar\amo\CredentialsOAuth
 */
class CredentialsOAuthQuery extends ActiveQuery
{
    /**
     * @return CredentialsOAuthQuery
     */
    public function active()
    {
        // todo modify query on prepare stage
        return $this->andWhere(['is', '[[deleted_at]]', null]);
    }

    /**
     * {@inheritdoc}
     * @return CredentialsOAuth[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CredentialsOAuth|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
