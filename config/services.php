<?php

return [

    /*
    |---------------------------------------------------------------------------
    | Third Party Services
    |---------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),       // Mailgun domain
        'secret' => env('MAILGUN_SECRET'),       // Mailgun secret key
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'), // Mailgun endpoint
        'scheme' => 'https',                     // Use HTTPS scheme
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),        // Postmark API token
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),      // AWS access key ID
        'secret' => env('AWS_SECRET_ACCESS_KEY'), // AWS secret access key
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // AWS region
    ],

];
