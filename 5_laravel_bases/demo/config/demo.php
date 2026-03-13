<?php

return [
    'enabled' => env('DEMO_MODE_ENABLED', false),
    'host' => env('DEMO_MODE_HOST', 'demo.prospect-it.com'),
    'auto_login' => env('DEMO_MODE_AUTO_LOGIN', false),
    'user_email' => env('DEMO_MODE_USER_EMAIL', 'test@example.com'),
];
