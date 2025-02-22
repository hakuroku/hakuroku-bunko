<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Router;
use App\Http\Middleware\CorsMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'cors' => CorsMiddleware::class
        ]);

        $middleware->api(prepend: [
            'cors' => CorsMiddleware::class
        ]);

        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
