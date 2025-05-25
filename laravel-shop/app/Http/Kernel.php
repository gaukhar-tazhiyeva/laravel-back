<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Глобальные HTTP middleware, которые будут выполняться при каждом запросе.
     */
    protected $middleware = [
        // Обрабатывает доверенные прокси
        \App\Http\Middleware\TrustProxies::class,

        // Обрабатывает CORS-запросы
        \Fruitcake\Cors\HandleCors::class,

        // Обрабатывает ошибки при обслуживании
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Проверка размера запроса
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Очищает входящие строки
        \App\Http\Middleware\TrimStrings::class,

        // Преобразует пустые строки в null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Middleware группы для маршрутов `web`.
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware, которые можно вызывать по ключу через routes.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // 🎯 Кастомный middleware для проверки роли администратора
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}
