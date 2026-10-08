<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

$current = current_page();
$seo = default_seo_for_page($current);
$pageTitle = $pageTitle ?? $seo['title'];
$pageDescription = $pageDescription ?? $seo['description'];
$pageKeywords = $pageKeywords ?? $seo['keywords'];
$pageImage = $pageImage ?? asset_url('assets/hero-product.jpg');
$canonical = $canonical ?? absolute_url($current);
$pageType = $pageType ?? ($current === 'product' || $current === 'shop' ? 'product' : 'website');

$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'Kyravia',
    'url' => absolute_url(),
    'logo' => asset_url('assets/logo.png'),
    'email' => SITE_EMAIL,
    'telephone' => FOUNDER_PHONE_TEL,
    'founders' => [
        [
            '@type' => 'Person',
            'name' => FOUNDER_NAME,
        ],
    ],
    'areaServed' => 'Pakistan',
    'sameAs' => [],
    'contactPoint' => [
        [
            '@type' => 'ContactPoint',
            'telephone' => FOUNDER_PHONE_TEL,
            'contactType' => 'customer service',
            'areaServed' => 'PK',
            'availableLanguage' => ['English', 'Urdu'],
        ],
    ],
];

$productSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => PRODUCT_NAME,
    'image' => [
        asset_url('assets/hero-product.jpg'),
        asset_url('assets/banner-silky-strong.jpg'),
    ],
    'description' => 'Kyravia Premium Herbal Shampoo — best herbal shampoo option for everyday silky, strong hair in Pakistan.',
    'sku' => PRODUCT_SKU,
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Kyravia',
    ],
    'offers' => [
        '@type' => 'Offer',
        'url' => absolute_url('shop'),
        'priceCurrency' => 'PKR',
        'price' => (string) PRODUCT_PRICE,
        'availability' => 'https://schema.org/InStock',
        'seller' => [
            '@type' => 'Organization',
            'name' => 'Kyravia',
        ],
    ],
];

$webSiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => 'Kyravia',
    'url' => absolute_url(),
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => absolute_url('shop'),
        'query-input' => 'required name=search_term_string',
    ],
];
?>
<!DOCTYPE html>
<html lang="en-PK">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>">
  <meta name="keywords" content="<?= e($pageKeywords) ?>">
  <meta name="author" content="<?= e(FOUNDER_NAME) ?>">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <meta name="googlebot" content="index, follow">
  <meta name="geo.region" content="PK">
  <meta name="geo.placename" content="Pakistan">
  <meta name="language" content="English">
  <link rel="canonical" href="<?= e($canonical) ?>">

  <meta property="og:type" content="<?= e($pageType === 'product' ? 'product' : 'website') ?>">
  <meta property="og:site_name" content="Kyravia">
  <meta property="og:title" content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($pageDescription) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= e($pageImage) ?>">
  <meta property="og:locale" content="en_PK">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($pageTitle) ?>">
  <meta name="twitter:description" content="<?= e($pageDescription) ?>">
  <meta name="twitter:image" content="<?= e($pageImage) ?>">

  <link rel="icon" href="/assets/favicon.png" type="image/png" sizes="64x64">
  <link rel="icon" href="/assets/favicon-32.png" type="image/png" sizes="32x32">
  <link rel="apple-touch-icon" href="/assets/favicon-180.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="/css/styles.css">

  <script type="application/ld+json"><?= json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
  <script type="application/ld+json"><?= json_encode($webSiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
  <?php if ($current === '' || $current === 'product' || $current === 'shop'): ?>
  <script type="application/ld+json"><?= json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
  <?php endif; ?>
  <?php if (!empty($extraJsonLd)): ?>
  <script type="application/ld+json"><?= json_encode($extraJsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
  <?php endif; ?>
</head>
<body>
  <header class="site-nav">
    <a class="nav-logo" href="<?= e(url_path()) ?>" aria-label="Kyravia home">
      <img src="/assets/logo.png" alt="Kyravia — best herbal shampoo in Pakistan" width="220" height="120">
    </a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>
    <nav id="primary-nav" class="primary-nav" aria-label="Primary">
      <ul class="nav-links">
        <?php foreach ($NAV_ITEMS as $slug => $label): ?>
          <li>
            <a href="<?= e(url_path($slug)) ?>" class="<?= $current === $slug ? 'is-active' : '' ?><?= $slug === 'shop' ? ' nav-cta' : '' ?>">
              <?= e($label) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </header>
