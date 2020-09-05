<?php

namespace AmoCRMTech\Yii2\Components\Client\OAuth;

use yii\base\Model;

class Config extends Model
{
    public ?string $subdomain     = null;
    public ?string $accessToken   = null;
    public ?string $refreshToken  = null;
    public ?string $redirectUri   = null;
    public ?string $integrationId = null;
    public ?string $secretKey     = null;

    public function rules(): array
    {
        return [
            ['subdomain', 'string'],
            ['subdomain', 'required'],

            ['accessToken', 'string'],

            ['refreshToken', 'string'],
            ['refreshToken', 'required'],

            ['redirectUri', 'string'],
            ['redirectUri', 'required'],

            ['integrationId', 'string'],
            ['integrationId', 'required'],

            ['secretKey', 'string'],
            ['secretKey', 'required'],
        ];
    }
}