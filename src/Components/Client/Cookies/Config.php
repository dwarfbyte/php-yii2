<?php
/** @noinspection PhpUnused */

namespace AmoCRMTech\Yii2\Components\Client\Cookies;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;

class Config extends Model
{
    public ?string $subdomain   = null;
    public ?string $login       = null;
    public ?string $token       = null;
    public ?string $cookiesFile = null;

    public function rules(): array
    {
        return [
            ['subdomain', 'string'],
            ['subdomain', 'required'],

            ['login', 'string'],
            ['login', 'required'],

            ['token', 'string'],
            ['token', 'required'],

            ['cookiesFile', 'default', 'value' => '@runtime/amocrmtech/cookies_{subdomain}.bin'],
            ['cookiesFile', 'string'],
            ['cookiesFile', 'validateCookiesFile'],
            ['cookiesFile', 'required'],
        ];
    }

    public function validateCookiesFile(string $attr)
    {
        $this->$attr = strtr($this->$attr, ['{subdomain}' => $this->subdomain]);
        $this->$attr = FileHelper::normalizePath(Yii::getAlias($this->$attr), '/');
    }

    public function attributeLabels(): array
    {
        return [
            'subdomain'   => 'Поддомен',
            'login'       => 'Логин',
            'token'       => 'Токен',
            'cookiesFile' => 'Файл с cookies',
        ];
    }

    public function attributeHints(): array
    {
        return [
            'subdomain'   => 'Поддомен вашего аккаунта в amocrm, например: "subdomain" из "subdomain.amocrm.ru"',
            'login'       => 'Ваш логин в amocrm, в настройках профиля называется "Email"',
            'token'       => 'Токен, в настройках профиля называется "API Ключ"',
            'cookiesFile' => 'Файл с cookies, для сохранения данных по аутентификации, истекает ~каждые 15 минут, автоматически перезаписывается',
        ];
    }
}