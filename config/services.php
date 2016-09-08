<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'maps-api-key' => 'AIzaSyAFtg67FGkPzztwBYPRq1EnvupxMLvRFJc',
        'recaptcha-site-key' => '6LfEjycTAAAAAF4WPi51pQSc-QhR242tkjgSU_jl',
        'recaptcha-secret-key' => '6LfEjycTAAAAAE7EcPgS_4odnoU2rCq-DX-uDdfL',
        'analytics-tracking-id' => 'UA-69576958-2',
    ],

    'facebook' => [
        'app-id' => '177428942597875',
        'page-url' => 'https://www.facebook.com/Giamcaneothon',
        'messenger-url' => 'https://www.messenger.com/t/Giamcaneothon/',

        'client_id' => '177428942597875',
        'client_secret' => 'de4afc5cdcc848b287a444bafbace320',
        'redirect' => env('FB_CALLBACK_URL', '/account/facebook/callback'),
        // add url to https://developers.facebook.com/apps/177428942597875/fb-login/
    ],

    'tawk-to' => [
        'api-key' => '57a1ea0214e2f0af26fe0d76'
    ]

];
