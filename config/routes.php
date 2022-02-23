<?php

use App\Controllers\ApiUsers;
use App\Controllers\Todos;

return [
    '/' => \App\Controllers\Homepage::class,
    '/users' => \App\Controllers\Users::class,
    '/api/users' => ApiUsers::class,
    '/todos' => Todos::class,
];