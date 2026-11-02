<?php

// Forward Vercel serverless requests to Laravel's public/index.php
// Ensure writable directories in /tmp for AWS Lambda / Vercel Serverless environment

$tmpStorage = '/tmp/storage';
$dirs = [
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

// Point Laravel view cache and session locations to /tmp
putenv('VIEW_COMPILED_PATH='.$tmpStorage.'/framework/views');
putenv('APP_SERVICES_CACHE='.$tmpStorage.'/framework/cache/services.php');
putenv('APP_PACKAGES_CACHE='.$tmpStorage.'/framework/cache/packages.php');
putenv('APP_CONFIG_CACHE='.$tmpStorage.'/framework/cache/config.php');
putenv('APP_ROUTES_CACHE='.$tmpStorage.'/framework/cache/routes.php');
putenv('APP_EVENTS_CACHE='.$tmpStorage.'/framework/cache/events.php');
putenv('LOG_CHANNEL=stderr');
putenv('CACHE_STORE=array');
putenv('SESSION_DRIVER=cookie');

// Prepare SQLite database in /tmp if external DB is not specified
$dbConnection = getenv('DB_CONNECTION') ?: 'sqlite';
if ($dbConnection === 'sqlite') {
    $targetDb = '/tmp/database/database.sqlite';
    $sourceDb = __DIR__.'/../database/database.sqlite';

    if (file_exists($sourceDb) && ! file_exists($targetDb)) {
        @copy($sourceDb, $targetDb);
    } elseif (! file_exists($targetDb)) {
        @touch($targetDb);
    }

    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE='.$targetDb);
    $_ENV['DB_CONNECTION'] = 'sqlite';
    $_ENV['DB_DATABASE'] = $targetDb;
}

// Require Laravel's standard front controller
require __DIR__.'/../public/index.php';
