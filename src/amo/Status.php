<?php
namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * @property int           $account_id  [bigint]
 * @property int           $pipeline_id [bigint]
 * @property int           $id          [bigint]
 * @property string        $name        [varchar(255)]
 * @property string        $color       [varchar(255)]
 * @property string        $sort        [integer]
 * @property bool          $is_editable [boolean]
 * @property int           $deleted_at  [timestamp]
 *
 * @property-read Account  $account
 * @property-read Pipeline $pipeline
 */
class Status extends ActiveRecord
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
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * {@inheritDoc}
     */
    public static function primaryKey()
    {
        return ['pipeline_id', 'id'];
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            ['account_id', 'exist', 'targetRelation' => 'account'],
            ['account_id', 'required'],

            ['pipeline_id', 'exist', 'targetRelation' => 'pipeline'],
            ['pipeline_id', 'required'],

            ['id', 'integer'],
            ['id', 'required'],

            ['name', 'string'],
            ['color', 'string'],
            ['sort', 'integer'],
            ['is_editable', 'boolean'],
            ['deleted_at', 'safe'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Account::class, ['id' => 'account_id'])->inverseOf('statuses');
    }

    /**
     * @return ActiveQuery
     */
    public function getPipeline()
    {
        return $this->hasOne(Pipeline::class, ['id' => 'pipeline_id'])->inverseOf('statuses');
    }
}