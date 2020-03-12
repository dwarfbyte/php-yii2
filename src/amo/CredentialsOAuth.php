<?php /** @noinspection ReturnTypeCanBeDeclaredInspection */

namespace amocrmtech\models\ar\amo;

use amocrmtech\models\ar\amo\query\CredentialsOAuthQuery;
use DateTime;
use Exception;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int               $id                [bigint]
 * @property int               $account_id        [bigint]
 * @property int               $account_subdomain [varchar(255)]
 * @property string            $integration_id    [varchar(255)]
 * @property string            $secret_key        [varchar(255)]
 * @property string            $redirect_uri      [varchar(255)]
 * @property string            $token_type        [varchar(255)]
 * @property string            $expires_in        [integer]
 * @property int               $expires_at        [timestamp]
 * @property int               $deleted_at        [timestamp]
 * @property string            $access_token
 * @property string            $refresh_token     [varchar(255)]
 *
 * @property-write int         $expiresIn
 * @property-read Account      $account
 */
class CredentialsOAuth extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @return Connection
     * @throws InvalidConfigException
     */
    public static function getDb(): Connection
    {
        $locator = Yii::$app->params['amocrmtech.models.ar.locator'];
        $db      = Yii::$app->params['amocrmtech.models.ar.amo.db'];
        /** @noinspection PhpIncompatibleReturnTypeInspection,NullPointerExceptionInspection */
        return Yii::$app->get($locator)->get($db);
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName(): string
    {
        return '{{%credentials_oauth}}';
    }


    /**
     * {@inheritdoc}
     * @return CredentialsOAuthQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CredentialsOAuthQuery(static::class);
    }

    /**
     * {@inheritDoc}
     */
    public function rules():array
    {
        return [
            ['account_id', 'exist', 'targetClass' => Account::class, 'targetAttribute' => 'id'],
            ['account_id', 'required'],

            ['account_subdomain', 'exist', 'targetClass' => Account::class, 'targetAttribute' => 'subdomain'],
            ['account_subdomain', 'required'],

            ['integration_id', 'string'],
            ['integration_id', 'required'],

            ['secret_key', 'string'],
            ['secret_key', 'required'],

            ['redirect_uri', 'url'],
            ['redirect_uri', 'required'],

            ['token_type', 'string'],
            ['token_type', 'required'],

            ['expires_in', 'integer'],

            ['expires_at', 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            ['deleted_at', 'datetime', 'format' => 'php:Y-m-d H:i:s'],

            ['access_token', 'string'],

            ['refresh_token', 'string'],
            ['refresh_token', 'required'],
        ];
    }

    /**
     * @param int $value seconds
     *
     * @return $this
     * @throws Exception
     */
    public function setExpiresIn(int $value): self
    {
        $this->expires_in = $value;
        $this->expires_at = (new DateTime('now'))->modify("+{$value} seconds")->format('Y-m-d H:i:s');

        return $this;
    }

    /**
     * @return ActiveQuery
     */
    public function getAccount(): ActiveQuery
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('credentials');
    }
}