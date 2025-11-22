<?php
session_start();

use Wasf\Exceptions\Handler;
use Wasf\Exceptions\HttpException;

require __DIR__ . '/../vendor/autoload.php';

set_exception_handler([Handler::class, 'handleException']);

/**
 * 1. Boot Application
 */
$app = require __DIR__ . '/../bootstrap/app.php';

/**
 * 2. Buat Router SATU KALI
 */
$router = new \Wasf\Routing\Router();

/**
 * 3. Bind Router ke container
 */
$app->bind(\Wasf\Routing\Router::class, $router);

/**
 * 4. Register Middleware
 */
$router->aliasMiddleware('auth', \Wasf\Http\Middleware\AuthMiddleware::class);
$router->aliasMiddleware('guest', \Wasf\Http\Middleware\GuestMiddleware::class);

$router->middlewareGroup('web', [
    \Wasf\Http\Middleware\StartSessionMiddleware::class,
    \Wasf\Http\Middleware\CsrfMiddleware::class,
]);

$router->middleware([
    \Wasf\Http\Middleware\MaintenanceMiddleware::class
]);

/**
 * 5. Load all routes
 */
require __DIR__ . '/../routes/web.php';

foreach (glob(__DIR__ . '/../Modules/*/routes.php') as $moduleRoute) {
    require $moduleRoute;
}

/**
 * 6. Dispatch
 */
try {

    $method = $_SERVER['REQUEST_METHOD'];
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    $route = $router->dispatch($method, $uri);

    if (!$route) {
        throw new HttpException(404, "Route {$uri} tidak ditemukan.");
    }

    $dispatcher = new \Wasf\Routing\Dispatcher(
        $router->getCollection(),
        $app,
        $router
    );

    $response = $dispatcher->dispatchRoute($route);

    if ($response instanceof \Wasf\Http\Response) {
        $response->send();
        exit;
    }

    echo $response;

} catch (\Throwable $e) {

    // LANGSUNG serahkan ke Handler
    Handler::handleException($e);

    // sangat penting: exit supaya tidak lanjut kode
    exit;
}

