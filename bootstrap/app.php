<?php

use App\Http\Middleware\RedirectToHomePage;
use App\Http\Middleware\SetLocale;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Middleware\UserBlocked;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        then: function () {
            Route::middleware('web')
                ->prefix('{locale}')
                ->where(['locale' => '[a-zA-Z]{2}'])
                ->group(base_path('routes/web.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(SetLocale::class);
        $middleware->appendToGroup('web', [
            // SetLocale::class,
            RedirectToHomePage::class,
            UserBlocked::class
        ]);
        $middleware->appendToGroup('api', [
            // SetLocale::class,
            UserBlocked::class,
        ]);
        $middleware->redirectGuestsTo(fn(Request $request) => route('login', app()->getLocale()));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/v1/*')) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 401);
            }
        });
    })->create();
