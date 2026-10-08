<?php
declare(strict_types=1);

// Router for PHP's built-in server: php -S localhost:8000 router.php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');
$file = __DIR__ . $uri;

if ($uri !== '/' && is_file($file)) {
    return false;
}

require_once __DIR__ . '/index.php';
