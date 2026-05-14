<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

/*
|--------------------------------------------------------------------------
| Vercel /tmp Writable Directory Setup
|--------------------------------------------------------------------------
|
| Vercel's filesystem is read-only except for /tmp. We must redirect all
| Laravel's writable paths (storage, bootstrap/cache, view compiled)
| to /tmp BEFORE the application is created. This fixes both the
| CollisionServiceProvider error and bootstrap/cache writable error.
|
*/

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL'])) {
    $tmpBase = '/tmp/laravel';
    $dirs = [
        $tmpBase . '/storage/app/public',
        $tmpBase . '/storage/framework/cache/data',
        $tmpBase . '/storage/framework/sessions',
        $tmpBase . '/storage/framework/views',
        $tmpBase . '/storage/logs',
        $tmpBase . '/bootstrap/cache',
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }

    // Point Laravel's writable paths to /tmp
    $_ENV['CACHE_DRIVER']        = $_ENV['CACHE_DRIVER'] ?? 'array';
    $_ENV['SESSION_DRIVER']      = $_ENV['SESSION_DRIVER'] ?? 'cookie';
    $_ENV['LOG_CHANNEL']         = $_ENV['LOG_CHANNEL'] ?? 'stderr';
    $_ENV['VIEW_COMPILED_PATH']  = $tmpBase . '/storage/framework/views';
}

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// On Vercel, use /tmp for bootstrap cache to avoid read-only filesystem errors
if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL'])) {
    $app->useBootstrapPath('/tmp/laravel/bootstrap');
    $app->useStoragePath('/tmp/laravel/storage');
}

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
