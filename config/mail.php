<?php

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.yandex.ru'),
    'port' => env('MAIL_PORT', 587),
    'from' => [
        'address' => 'jun1or.club@yandex.ru',
        'name' => 'Junior CLub',
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME', 'jun1or.club@yandex.ru'),
    'password' => env('MAIL_PASSWORD', 'club.2019'),
];
