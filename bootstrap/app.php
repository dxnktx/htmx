<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->use([
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        ]);

        $middleware->alias([
            'web'          => \Modules\Authetication\src\Http\Middleware\UserMiddleware::class,
            'auth'          => \Modules\Authetication\src\Http\Middleware\UserMiddleware::class,
            'user'          => \Modules\Authetication\src\Http\Middleware\UserMiddleware::class,
            'admin'         => \Modules\Authetication\src\Http\Middleware\AdminMiddleware::class,
            'role'          => \Modules\Authetication\src\Http\Middleware\RoleMiddleware::class,
            'permission'    => \Modules\Authetication\src\Http\Middleware\PermissionMiddleware::class,
            'locale'        => \Modules\Authetication\src\Http\Middleware\Locale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
