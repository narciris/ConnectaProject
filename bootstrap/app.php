<?php

use App\Exceptions\ApiExceptionHandler;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: [__DIR__.'/../routes/api.php',
              __DIR__.'/../routes/contacts.php',
              __DIR__.'/../routes/notification.php'
            
            ],
              
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
         $exceptions->shouldRenderJsonWhen(function (Request $request, Throwable $e) {
                        return ApiExceptionHandler::render($request, $e) ?? false;

        });
        
    })->create();
