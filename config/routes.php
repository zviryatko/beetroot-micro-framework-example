<?php

use App\Controllers\ApiUsers;

return [
    '/' => \App\Controllers\Homepage::class,
    '/users' => \App\Controllers\Users::class,
    '/api/users' => ApiUsers::class,
];