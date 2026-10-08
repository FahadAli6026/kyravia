<?php
declare(strict_types=1);

define('SITE_NAME', 'Kyravia');
define('SITE_TAGLINE', 'Pakistan ke baalon ki pehchaan');
define('FOUNDER_NAME', 'Malik Fahad Ali');
define('FOUNDER_PHONE', '03102527293');
define('FOUNDER_PHONE_TEL', '+923102527293');
define('SITE_EMAIL', 'kyraviashampoo@gmail.com');
define('PRODUCT_NAME', 'Kyravia Premium Herbal Shampoo');
define('PRODUCT_PRICE', 1890);
define('PRODUCT_SIZE', '400 ml');
define('CURRENCY', 'PKR');

define('DATA_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data');
define('ORDERS_FILE', DATA_DIR . DIRECTORY_SEPARATOR . 'orders.json');
define('INQUIRIES_FILE', DATA_DIR . DIRECTORY_SEPARATOR . 'wholesale.json');

$WHOLESALE_CITIES = [
    'Rawalpindi' => 'Central distribution for Punjab and the north',
    'Kashmir' => 'Northern partner supply and regional coverage',
    'Karachi' => 'Southern wholesale and bulk dispatch',
];

$NAV_ITEMS = [
    '' => 'Home',
    'product' => 'Product',
    'ingredients' => 'Ingredients',
    'how-to-use' => 'How to use',
    'about' => 'About',
    'reviews' => 'Reviews',
    'wholesale' => 'Wholesale',
    'shop' => 'Shop',
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

function url_path(string $slug = ''): string
{
    $slug = trim($slug, '/');
    return $slug === '' ? '/' : '/' . $slug;
}

function current_page(): string
{
    $script = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
    if ($script === 'index.php') {
        return '';
    }
    return preg_replace('/\.php$/', '', $script) ?: '';
}

function redirect_to(string $slug, array $query = []): void
{
    $target = url_path($slug);
    if ($query) {
        $target .= '?' . http_build_query($query);
    }
    header('Location: ' . $target);
    exit;
}

function send_site_email(string $subject, string $body, ?string $replyTo = null): bool
{
    $to = SITE_EMAIL;
    $from = SITE_EMAIL;
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: Kyravia <' . $from . '>',
        'X-Mailer: PHP/' . PHP_VERSION,
    ];
    if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }

    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    return @mail($to, $encodedSubject, $body, implode("\r\n", $headers));
}
