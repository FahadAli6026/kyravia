<?php
declare(strict_types=1);

define('SITE_NAME', 'Kyravia');
define('PRODUCT_NAME', 'Kyravia Daily Restore Shampoo');
define('PRODUCT_PRICE', 1890);
define('PRODUCT_SIZE', '300 ml');
define('CURRENCY', 'PKR');

define('DATA_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data');
define('ORDERS_FILE', DATA_DIR . DIRECTORY_SEPARATOR . 'orders.json');
define('INQUIRIES_FILE', DATA_DIR . DIRECTORY_SEPARATOR . 'wholesale.json');

$WHOLESALE_CITIES = [
    'Rawalpindi' => 'Central Punjab distribution hub',
    'Kashmir' => 'Northern supply & partner network',
    'Karachi' => 'Southern wholesale & bulk dispatch',
];

function ensure_data_dir(): void
{
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0755, true);
    }
}

function append_json_record(string $file, array $record): bool
{
    ensure_data_dir();
    $existing = [];
    if (is_file($file)) {
        $raw = file_get_contents($file);
        $decoded = json_decode($raw ?: '[]', true);
        if (is_array($decoded)) {
            $existing = $decoded;
        }
    }
    $existing[] = $record;
    $json = json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents($file, $json . PHP_EOL, LOCK_EX) !== false;
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function format_price(int $amount): string
{
    return 'Rs ' . number_format($amount);
}
