<?php
namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int           $id         [bigint]
 * @property int           $account_id [bigint]
 * @property string        $name       [varchar(255)]
 * @property string        $sort       [integer]
 * @property bool          $is_main    [boolean]
 * @property int           $deleted_at [timestamp]
 *
 * @property-read Account  $account
 * @property-read Status[] $statuses
 */
class Pipeline extends ActiveRecord
{
    /**
     * {@inheritDoc}
     * @return Connection
     * @throws InvalidConfigException
     */
    public static function getDb(): Connection
    {
        $locator = Yii::$app->params['amocrmtech.models.ar.amo.locator'];
        $db      = Yii::$app->params['amocrmtech.models.ar.amo.locator.db'];
        /** @noinspection PhpIncompatibleReturnTypeInspection,NullPointerExceptionInspection */
        return Yii::$app->get($locator)->get($db);
    }

    /**
     * {@inheritDoc}
     */
    public static function tableName()
    {
        return '{{%pipeline}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        // todo composite [account_id, id]?
        return parent::primaryKey();
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            ['account_id', 'exist', 'targetRelation' => 'account'],
            ['account_id', 'required'],

            ['id', 'integer'],
            ['id', 'unique'],
            ['id', 'required'],

            ['name', 'string'],
            ['sort', 'integer'],
            ['is_main', 'boolean'],
            ['deleted_at', 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('pipelines');
    }

    /**
     * @return ActiveQuery
     */
    public function getStatuses()
    {
        return $this->hasMany(Status::class, ['pipeline_id' => 'id'])->inverseOf('pipeline');
    }
}