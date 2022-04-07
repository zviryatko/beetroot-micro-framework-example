<?php

return new App\RoutesCollection([
    '/' => \App\Controllers\Homepage::class,
    '/users' => \App\Controllers\Users::class,
    '/api/users' => \App\Controllers\ApiUsers::class,
    '/todos' => \App\Controllers\Todos::class,
]);
