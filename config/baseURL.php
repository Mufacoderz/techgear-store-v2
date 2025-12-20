<?php

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

$host = $_SERVER['HTTP_HOST'] ?? 'localhost';

$rootFolder = basename(dirname(__DIR__));

define('BASE_URL', "{$scheme}://{$host}/{$rootFolder}/");
define('BASE_PATH', dirname(__DIR__) . '/');
