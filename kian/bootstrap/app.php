<?php
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Routing\Middleware\SubstituteBindings;
use App\Http\Middleware\Authorization;
use App\Http\Middleware\LocalizationMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authorization' => Authorization::class,
            'redirect' => RedirectIfAuthenticated::class,
            'sanctum' => EnsureFrontendRequestsAreStateful::class,
            // 'bindings' => SubstituteBindings::class,
            // 'localize' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            // 'localizationRedirect' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            // 'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            // 'localeCookieRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            // 'localeViewPath' => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
            'loc' => LocalizationMiddleware::class,

        ]);
        $middleware->web(remove: [
            SubstituteBindings::class,
        ]);
        $middleware->web(append: [
                // \CodeZero\LocalizedRoutes\Middleware\SetLocale::class,
            SubstituteBindings::class,
            LocalizationMiddleware::class,
        ]);

        // Apply middleware to api group
        $middleware->group('api', [
            // 'sanctum',
            // 'throttle:api',
            // 'bindings',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
