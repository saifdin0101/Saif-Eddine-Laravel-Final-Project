<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BodyMiddleware;
use App\Http\Middleware\CheckOutMiddleware;
use App\Http\Middleware\clientMiddleware;
use App\Http\Middleware\SeenBodyMiddleware;
use App\Http\Middleware\SessionMiddleware;
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
        //
        $middleware->alias([
            'BodyInformation' => BodyMiddleware::class ,
            'admin' => AdminMiddleware::class ,
            'OneInALifeTime' => SeenBodyMiddleware::class ,
            'CheckOut' => CheckOutMiddleware::class ,
            'Session' => SessionMiddleware::class ,
            'Favorite' => SessionMiddleware::class ,
            'Client' => clientMiddleware::class ,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
