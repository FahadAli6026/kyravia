<?php
declare(strict_types=1);

// php -S localhost:8000 router.php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/');
$uri = '/' . trim($uri, '/');
if ($uri === '/') {
    require __DIR__ . '/index.php';
    return true;
}

// Serve real files (css, js, assets, etc.)
$file = __DIR__ . $uri;
if (is_file($file)) {
    return false;
}

// Redirect /page.php -> /page
if (str_ends_with($uri, '.php')) {
    $clean = substr($uri, 0, -4);
    $qs = $_SERVER['QUERY_STRING'] ?? '';
    $target = ($clean === '/index' ? '/' : $clean) . ($qs !== '' ? '?' . $qs : '');
    header('Location: ' . $target, true, 301);
    return true;
}

// Map /process/order -> process/order.php
$phpFile = __DIR__ . $uri . '.php';
if (is_file($phpFile)) {
    require $phpFile;
    return true;
}

http_response_code(404);
echo '404 Not Found';
return true;
