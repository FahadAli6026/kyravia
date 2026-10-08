<?php
declare(strict_types=1);

define('SITE_NAME', 'Kyravia');
define('SITE_TAGLINE', 'Pakistan ke baalon ki pehchaan');
define('FOUNDER_NAME', 'Malik Fahad Ali');
define('FOUNDER_PHONE', '03102527293');
define('FOUNDER_PHONE_TEL', '+923102527293');
define('SITE_EMAIL', 'kyraviashampoo@gmail.com');
define('SITE_URL', 'https://www.kyravia.com');
define('PRODUCT_NAME', 'Kyravia Premium Herbal Shampoo');
define('PRODUCT_PRICE', 300);
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
            'title' => 'Kyravia Herbal Shampoo – Premium Shampoo in Pakistan',
            'description' => 'Kyravia premium herbal shampoo, 400 ml for Rs 1,890. Silky, strong hair for Pakistan\'s heat and dust. Cash on delivery nationwide. Order online today.',
            'keywords' => 'herbal shampoo Pakistan, Kyravia shampoo, premium shampoo Pakistan, shampoo price in Pakistan, buy shampoo online Pakistan',
        ],
        'product' => [
            'title' => 'Kyravia Herbal Shampoo 400ml – Price in Pakistan Rs 1,890',
            'description' => 'Kyravia herbal shampoo 400 ml: price, benefits and details. A premium daily shampoo for silky, manageable hair. Available with cash on delivery.',
            'keywords' => 'Kyravia shampoo 400ml, shampoo price in Pakistan, herbal shampoo buy online',
        ],
        'shop' => [
            'title' => 'Buy Kyravia Herbal Shampoo Online – Cash on Delivery',
            'description' => 'Order Kyravia herbal shampoo 400 ml at Rs 1,890 with cash on delivery across Pakistan. Quick phone confirmation and fast delivery.',
            'keywords' => 'buy shampoo online Pakistan, shampoo cash on delivery, Kyravia order',
        ],
        'ingredients' => [
            'title' => 'Kyravia Ingredients – Herbal Shampoo Formula',
            'description' => 'See what goes into Kyravia herbal shampoo: the botanical ingredients behind a soft, fresh and clean wash for everyday hair care.',
            'keywords' => 'herbal shampoo ingredients Pakistan, amla reetha shikakai, Kyravia formula',
        ],
        'how-to-use' => [
            'title' => 'How to Use Kyravia Shampoo – Daily Hair Care Routine',
            'description' => 'Step-by-step guide to using Kyravia herbal shampoo for best results, how often to wash, and tips for silky, strong hair.',
            'keywords' => 'how to use Kyravia shampoo, shampoo for silky hair, daily hair care Pakistan',
        ],
        'about' => [
            'title' => 'About Kyravia – Pakistan ke baalon ki pehchaan',
            'description' => 'The story of Kyravia, a Pakistani premium herbal shampoo brand founded by Malik Fahad Ali, made for Pakistani hair and weather.',
            'keywords' => 'About Kyravia, Malik Fahad Ali, Kyravia shampoo brand Pakistan',
        ],
        'reviews' => [
            'title' => 'Kyravia Shampoo Reviews – What Customers Say',
            'description' => 'Read real customer reviews of Kyravia herbal shampoo from across Pakistan, and share your own experience after your first wash.',
            'keywords' => 'Kyravia reviews, Kyravia shampoo reviews Pakistan',
        ],
        'faq' => [
            'title' => 'Kyravia FAQ – Herbal Shampoo Pakistan Questions',
            'description' => 'FAQs about Kyravia shampoo — price, ingredients, COD shipping in Pakistan, wholesale hubs, and how to order online.',
            'keywords' => 'Kyravia FAQ, herbal shampoo Pakistan questions',
        ],
        'wholesale' => [
            'title' => 'Kyravia Shampoo Wholesale – Rawalpindi, Kashmir, Karachi',
            'description' => 'Become a Kyravia stockist. Wholesale herbal shampoo supply from hubs in Rawalpindi, Kashmir and Karachi. Call or WhatsApp 0310 2527293.',
            'keywords' => 'wholesale shampoo Rawalpindi, wholesale shampoo Karachi, Kyravia wholesale',
        ],
    ];

    return $map[$slug] ?? $map[''];
}
