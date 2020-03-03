<?php
namespace amocrmtech\models\ar\amo;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Connection;

/** @noinspection PropertiesInspection */

/**
 * @property int                $id           [bigint]
 * @property string             $name         [varchar(255)]
 * @property string             $last_name    [varchar(255)]
 * @property string             $login        [varchar(255)]
 * @property string             $language     [varchar(255)]
 * @property string             $phone_number [varchar(255)]
 *
 * @property-read UserAccount[] $userAccounts
 */
class User extends ActiveRecord
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
     * @return string
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            ['id', 'integer'],
            ['id', 'unique'],
            ['id', 'required'],

            ['login', 'string'],
            ['login', 'unique'],
            ['login', 'required'],

            ['name', 'string'],
            ['last_name', 'string'],
            ['language', 'string'],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUserAccounts()
    {
        return $this->hasMany(UserAccount::class, ['user_id' => 'id'])->inverseOf('user');
    }
}