<?php

namespace amocrmtech\models\ar\app;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property int                    $id             [bigint]
 * @property int                    $user_id        [bigint]
 * @property string                 $integration_id [uuid]
 * @property string                 $token          [varchar(64)]
 * @property int                    $expires_at     [timestamp]
 *
 * @property-read User              $user
 * @property-read Integration       $integration
 * @property-read IdentityInterface $identity
 */
class OAuthState extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @throws InvalidConfigException
     */
    public static function getDb()
    {
        $db = Yii::$app->params['amocrmtech.models.ar.app.db'];
        return Yii::$app->get($db);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'oauth_state';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['integration_id', 'exist', 'targetRelation' => 'integration'],
            ['integration_id', 'required'],

            ['user_id', 'exist', 'targetRelation' => 'identity'],
            ['user_id', 'required'],

            ['token', 'string', 'min' => 64],
            ['token', 'required'],
            ['token', 'unique'],

            ['expires_at', 'datetime', 'format' => 'php:' . DATE_RFC3339],
            ['expires_at', 'required'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getIdentity(): ActiveQuery
    {
        return $this->getUser()->andOnCondition(['status' => User::STATUS_ACTIVE]);
    }

    /**
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getIntegration(): ActiveQuery
    {
        return $this->hasOne(Integration::class, ['id' => 'integration_id']);
    }
}