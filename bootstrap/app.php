<?php

use Wasf\Foundation\Application;
use Wasf\Support\Dotenv;
use Wasf\Support\Config;

// --------------------------------------------------
// 1. Base Path
// --------------------------------------------------
$base = dirname(__DIR__);

// --------------------------------------------------
// 2. Load dotenv
// --------------------------------------------------
if (class_exists(Dotenv::class)) {
    Dotenv::load($base);
}

// --------------------------------------------------
// 3. Load helpers
// --------------------------------------------------
$helpersFile = $base . '/bootstrap/helpers.php';
if (file_exists($helpersFile)) {
    require $helpersFile;
}

$helpersPath = $base . '/helpers';
if (is_dir($helpersPath)) {
    foreach (glob($helpersPath . '/*.php') as $file) {
        require_once $file;
    }
}

// --------------------------------------------------
// 4. Create Application container
// --------------------------------------------------
$app = new Application($base);

// --------------------------------------------------
// 5. Load all config/*.php files
// --------------------------------------------------
Config::load($base . '/config');

// register aliases
$aliases = Config::get('app.aliases', []);
foreach ($aliases as $alias => $class) {
    if (!class_exists($alias)) {
        class_alias($class, $alias);
    }
}

$timezone = Config::get('app.timezone', 'UTC');
date_default_timezone_set($timezone);

// --------------------------------------------------
// Faker Locale Support
// --------------------------------------------------
if (class_exists(\Faker\Factory::class)) {
    $fakerLocale = Config::get('app.faker_locale', 'en_US');
    $app->bind('faker', function() use ($fakerLocale) {
        return Faker\Factory::create($fakerLocale);
    });
}

// --------------------------------------------------
// 6. Connect Database BEFORE Auth system uses it!
// --------------------------------------------------
$dbConf = Config::get('database');
\Wasf\Database\DB::connect($dbConf);   // 🔥 FIX PENTING

// optional: bind to container
$app->bind(\Wasf\Database\DB::class, function() use ($dbConf) {
    return \Wasf\Database\DB::connect($dbConf);
});

// --------------------------------------------------
// 7. Register Auth Guard (now DB is ready!)
// --------------------------------------------------
$provider = new \Wasf\Auth\ModelProvider(\Modules\Auth\Models\User::class);
$guard = new \Wasf\Auth\SessionGuard($provider);

\Wasf\Auth\AuthManager::instance()->registerGuard('web', $guard);
\Wasf\Auth\AuthManager::instance()->setDefaultGuard('web');

// --------------------------------------------------
// 8. Global app instance
// --------------------------------------------------
$GLOBALS['app'] = $app;

return $app;
