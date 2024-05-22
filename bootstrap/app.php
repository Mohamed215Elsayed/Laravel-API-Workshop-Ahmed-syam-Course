<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RequestId;//
use Illuminate\Http\JsonResponse;//
use Illuminate\Auth\Access\AuthorizationException;//
use Illuminate\Support\Facades\Log;//
// use Throwable;
use Sentry\Laravel\Integration;//for sentry exception
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->statefulApi();//sanctum
        $middleware->append(RequestId::class);
    })
    /*======================Exceptions=============*/
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (AuthorizationException $e) {
                return response()->json([
                    "status" => "error",
                    'errors' => [
                        'generic' =>'Not authenticated'
                        ]
                ], JsonResponse::HTTP_UNAUTHORIZED);
        });
        $exceptions->renderable(function (Throwable $e) {
              // if('APP_ENV' === 'local'){
            //     Log::error($e);
            // }
            //     if('APP_ENV' === 'production'){
            //     // Integration::handles($e);//in 11.0
            //     // if(app()->bound('Sentry\Client')){//9.0
            //     //     app('sentry')->captureException($e);
            //     // }
            // }
                return response()->json([
                    "status" => "error",
                    // 'errors' => ['generic' => sprintf('%s: %s', $e->getMessage(), $e->getCode())],//دا لو عايز تشوف الايرورز
                    'errors' => ['generic' =>'Unknown error']
                ], JsonResponse::HTTP_BAD_REQUEST);
        });
        $exceptions->reportable(function (Throwable $e) {
            //
        });
    })->create();
/*========================================================= */