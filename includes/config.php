<?php
declare(strict_types=1);

define('SITE_NAME', 'Kyravia');
define('SITE_TAGLINE', 'Pakistan ke baalon ki pehchaan');
define('FOUNDER_NAME', 'Malik Fahad Ali');
define('FOUNDER_PHONE', '03102527293');
define('FOUNDER_PHONE_TEL', '+923102527293');
define('SITE_EMAIL', 'kyraviashampoo@gmail.com');
// Set your live domain here after hosting (example: https://kyravia.pk)
define('SITE_URL', '');
define('PRODUCT_NAME', 'Kyravia Premium Herbal Shampoo');
define('PRODUCT_PRICE', 1890);
define('PRODUCT_SIZE', '400 ml');
define('CURRENCY', 'PKR');
define('PRODUCT_SKU', 'KYR-SH-400');

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
    'faq' => 'FAQ',
    'wholesale' => 'Wholesale',
    'shop' => 'Shop',
];

$SITEMAP_PAGES = [
    '' => ['priority' => '1.0', 'changefreq' => 'weekly'],
    'product' => ['priority' => '0.9', 'changefreq' => 'weekly'],
    'shop' => ['priority' => '0.9', 'changefreq' => 'weekly'],
    'ingredients' => ['priority' => '0.8', 'changefreq' => 'monthly'],
    'how-to-use' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'about' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'reviews' => ['priority' => '0.8', 'changefreq' => 'weekly'],
    'faq' => ['priority' => '0.8', 'changefreq' => 'monthly'],
    'wholesale' => ['priority' => '0.8', 'changefreq' => 'monthly'],
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

function site_base_url(): string
{
    if (SITE_URL !== '') {
        return rtrim(SITE_URL, '/');
    }
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['SERVER_PORT']) && (string) $_SERVER['SERVER_PORT'] === '443');
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    return ($https ? 'https' : 'http') . '://' . $host;
}

function url_path(string $slug = ''): string
{
    $slug = trim($slug, '/');
    return $slug === '' ? '/' : '/' . $slug;
}

function absolute_url(string $slug = ''): string
{
    $path = url_path($slug);
    return site_base_url() . ($path === '/' ? '/' : $path);
}

function asset_url(string $path): string
{
    return site_base_url() . '/' . ltrim($path, '/');
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

function default_seo_for_page(string $slug): array
{
    $map = [
        '' => [
            'title' => 'Kyravia | Best Herbal Shampoo in Pakistan',
            'description' => 'Kyravia is a premium herbal shampoo in Pakistan — silky, strong hair care. Shop online with COD. Wholesale in Rawalpindi, Kashmir & Karachi. Pakistan ke baalon ki pehchaan.',
            'keywords' => 'Kyravia, Kyravia shampoo, best shampoo in Pakistan, best herbal shampoo Pakistan, Pakistan shampoo, herbal shampoo, buy shampoo online Pakistan',
        ],
        'product' => [
            'title' => 'Kyravia Premium Herbal Shampoo 400ml | Best Shampoo Pakistan',
            'description' => 'Buy Kyravia Premium Herbal Shampoo (400 ml) — Pakistan’s focused daily restore formula for silky, strong hair. Price, benefits, and online order.',
            'keywords' => 'Kyravia shampoo 400ml, best shampoo Pakistan, herbal shampoo buy online, Kyravia product',
        ],
        'shop' => [
            'title' => 'Buy Kyravia Shampoo Online Pakistan | COD Available',
            'description' => 'Order Kyravia shampoo online across Pakistan. Cash on delivery. Confirmed by phone before dispatch.',
            'keywords' => 'buy shampoo online Pakistan, Kyravia order, shampoo COD Pakistan',
        ],
        'ingredients' => [
            'title' => 'Kyravia Ingredients | Herbal Shampoo Formula Pakistan',
            'description' => 'Explore Kyravia herbal shampoo ingredients inspired by amla, reetha, and shikakai for a clean, soft daily wash.',
            'keywords' => 'herbal shampoo ingredients Pakistan, amla shampoo, Kyravia formula',
        ],
        'how-to-use' => [
            'title' => 'How to Use Kyravia Shampoo | Daily Hair Care Routine',
            'description' => 'Learn how to use Kyravia shampoo in 3 simple steps for soft, light, everyday hair.',
            'keywords' => 'how to use Kyravia shampoo, shampoo routine Pakistan',
        ],
        'about' => [
            'title' => 'About Kyravia | Founder Malik Fahad Ali',
            'description' => 'About Kyravia — Pakistan ke baalon ki pehchaan. Founded by Malik Fahad Ali. Premium single-product herbal shampoo brand.',
            'keywords' => 'About Kyravia, Malik Fahad Ali, Kyravia shampoo brand Pakistan',
        ],
        'reviews' => [
            'title' => 'Kyravia Reviews | Customer Feedback Pakistan',
            'description' => 'Read Kyravia shampoo reviews from customers across Pakistan — soft feel, premium bottle, daily restore results.',
            'keywords' => 'Kyravia reviews, best shampoo reviews Pakistan',
        ],
        'faq' => [
            'title' => 'Kyravia FAQ | Best Shampoo in Pakistan Questions',
            'description' => 'FAQs about Kyravia shampoo — price, ingredients, shipping in Pakistan, wholesale, and why Kyravia is a top herbal shampoo choice.',
            'keywords' => 'Kyravia FAQ, best shampoo Pakistan questions, herbal shampoo Pakistan',
        ],
        'wholesale' => [
            'title' => 'Kyravia Wholesale Pakistan | Rawalpindi Kashmir Karachi',
            'description' => 'Kyravia shampoo wholesale supply in Rawalpindi, Kashmir, and Karachi. Partner for shops and salons across Pakistan.',
            'keywords' => 'shampoo wholesale Pakistan, Kyravia wholesale, shampoo distributor Rawalpindi Karachi',
        ],
    ];

    return $map[$slug] ?? $map[''];
}
