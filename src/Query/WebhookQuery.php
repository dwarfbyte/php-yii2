<?php
namespace AmoCRMTech\Yii2\Query;

use AmoCRMTech\Yii2\Models\Webhook;
use yii\db\ActiveQuery;

/**
 * @see \AmoCRMTech\Yii2\Models\Webhook
 */
class WebhookQuery extends ActiveQuery
{
    /**
     * {@inheritDoc}
     * @return Webhook[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritDoc}
     * @return Webhook|array|null
     * @noinspection SenselessProxyMethodInspection
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}