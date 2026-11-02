<?php

// Forward Vercel serverless requests to Laravel's public/index.php
// Ensure writable directories in /tmp for AWS Lambda / Vercel Serverless environment

$tmpStorage = '/tmp/storage';
$dirs = [
    $tmpStorage.'/app/public',
    $tmpStorage.'/framework/views',
    $tmpStorage.'/framework/cache',
    $tmpStorage.'/framework/cache/data',
    $tmpStorage.'/framework/sessions',
    $tmpStorage.'/logs',
    '/tmp/database',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Set up APP_STORAGE
putenv('APP_STORAGE='.$tmpStorage);
$_ENV['APP_STORAGE'] = $tmpStorage;
$_SERVER['APP_STORAGE'] = $tmpStorage;

// Set up default APP_KEY if not configured in environment
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? 'base64:BinFK8X+YLIW9Qv6TRjtSBvERMeIvNNFQWBX+EptkQM=');
putenv('APP_KEY='.$appKey);
$_ENV['APP_KEY'] = $appKey;
$_SERVER['APP_KEY'] = $appKey;

// Point Laravel view cache and cache locations to /tmp
putenv('VIEW_COMPILED_PATH='.$tmpStorage.'/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = $tmpStorage.'/framework/views';
$_SERVER['VIEW_COMPILED_PATH'] = $tmpStorage.'/framework/views';

putenv('APP_SERVICES_CACHE='.$tmpStorage.'/framework/cache/services.php');
$_ENV['APP_SERVICES_CACHE'] = $tmpStorage.'/framework/cache/services.php';
$_SERVER['APP_SERVICES_CACHE'] = $tmpStorage.'/framework/cache/services.php';

putenv('APP_PACKAGES_CACHE='.$tmpStorage.'/framework/cache/packages.php');
$_ENV['APP_PACKAGES_CACHE'] = $tmpStorage.'/framework/cache/packages.php';
$_SERVER['APP_PACKAGES_CACHE'] = $tmpStorage.'/framework/cache/packages.php';

putenv('APP_CONFIG_CACHE='.$tmpStorage.'/framework/cache/config.php');
$_ENV['APP_CONFIG_CACHE'] = $tmpStorage.'/framework/cache/config.php';
$_SERVER['APP_CONFIG_CACHE'] = $tmpStorage.'/framework/cache/config.php';

putenv('APP_ROUTES_CACHE='.$tmpStorage.'/framework/cache/routes.php');
$_ENV['APP_ROUTES_CACHE'] = $tmpStorage.'/framework/cache/routes.php';
$_SERVER['APP_ROUTES_CACHE'] = $tmpStorage.'/framework/cache/routes.php';

putenv('APP_EVENTS_CACHE='.$tmpStorage.'/framework/cache/events.php');
$_ENV['APP_EVENTS_CACHE'] = $tmpStorage.'/framework/cache/events.php';
$_SERVER['APP_EVENTS_CACHE'] = $tmpStorage.'/framework/cache/events.php';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
$_SERVER['LOG_CHANNEL'] = 'stderr';

putenv('CACHE_STORE=array');
$_ENV['CACHE_STORE'] = 'array';
$_SERVER['CACHE_STORE'] = 'array';

putenv('SESSION_DRIVER=cookie');
$_ENV['SESSION_DRIVER'] = 'cookie';
$_SERVER['SESSION_DRIVER'] = 'cookie';

// Prepare SQLite database in /tmp
$dbConnection = getenv('DB_CONNECTION') ?: ($_ENV['DB_CONNECTION'] ?? 'sqlite');
if ($dbConnection === 'sqlite') {
    $targetDb = '/tmp/database/database.sqlite';
    $sourceDb = dirname(__DIR__).'/database/database.sqlite';

    if (file_exists($sourceDb) && (! file_exists($targetDb) || filesize($targetDb) === 0)) {
        @copy($sourceDb, $targetDb);
    } elseif (! file_exists($targetDb)) {
        @touch($targetDb);
    }

    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE='.$targetDb);
    $_ENV['DB_CONNECTION'] = 'sqlite';
    $_ENV['DB_DATABASE'] = $targetDb;
    $_SERVER['DB_CONNECTION'] = 'sqlite';
    $_SERVER['DB_DATABASE'] = $targetDb;
}

// Require Laravel's standard front controller
require __DIR__.'/../public/index.php';
