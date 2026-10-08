<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? 'Kyravia — Pakistan ke baalon ki pehchaan. Premium herbal shampoo. Shop online. Wholesale in Rawalpindi, Kashmir, and Karachi.';
$current = current_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>">
  <link rel="icon" href="/assets/favicon.png" type="image/png" sizes="64x64">
  <link rel="icon" href="/assets/favicon-32.png" type="image/png" sizes="32x32">
  <link rel="apple-touch-icon" href="/assets/favicon-180.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
  <header class="site-nav">
    <a class="nav-logo" href="<?= e(url_path()) ?>" aria-label="Kyravia home">
      <img src="/assets/logo.png" alt="Kyravia" width="220" height="120">
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
