<?php
/** @noinspection PhpMissingFieldTypeInspection */

namespace AmoCRMTech\Yii2\Components\Client;

use yii\base\Model;

class RequestConfig extends Model
{
    public ?string $account_subdomain = null;
    public ?int    $account_id        = null;

    public ?string $access_token   = null;
    public ?string $refresh_token  = null;
    public ?string $redirect_uri   = null;
    public ?string $integration_id = null;
    public ?string $secret_key     = null;

    public $on_refresh = null;

    public function rules(): array
    {
        return [
            ['account_subdomain', 'string'],
            ['account_subdomain', 'required'],

            ['account_id', 'filter', 'filter' => 'intval', 'skipOnEmpty' => true],

            ['access_token', 'string'],

            ['refresh_token', 'string'],
            ['refresh_token', 'required'],

            ['redirect_uri', 'string'],
            ['redirect_uri', 'required'],

            ['integration_id', 'string'],
            ['integration_id', 'required'],

            ['secret_key', 'string'],
            ['secret_key', 'required'],

            ['on_refresh', 'safe'],
        ];
    }
}