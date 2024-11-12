<?php
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

protected $middlewareGroups = [
    'web' => [
        // Other middleware...
    ],

    'api' => [
        EnsureFrontendRequestsAreStateful::class, // Important for cookie-based auth
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
