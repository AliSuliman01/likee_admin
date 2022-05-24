<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'instagram' => [
        'client_id' => env('INSTAGRAM_CLIENT_ID','1467962533658136'),
        'client_secret' => env('INSTAGRAM_CLIENT_SECRET','d8f7b703797bbe2c4baa5673d0c5a577'),
        'redirect' => env('INSTAGRAM_REDIRECT_URI','https://likee-admin.herokuapp.com/api/auth/callback')
    ],
    'facebook' => [
        'client_id' => '5192618307463764',
        'client_secret' => '7ef0cf78cf851f9fba0034fba9827e82',
        'redirect' => 'https://likee-admin.herokuapp.com/api/auth/callback',
    ],

];
