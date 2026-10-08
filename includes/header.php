<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? 'Kyravia — a single, carefully made shampoo for daily restore. Shop online across Pakistan. Wholesale in Rawalpindi, Kashmir, and Karachi.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($pageDescription) ?>">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header class="site-nav">
    <a class="nav-brand" href="index.php">Kyravia</a>
    <nav aria-label="Primary">
      <ul class="nav-links">
        <li><a href="index.php#product">Product</a></li>
        <li><a href="index.php#wholesale">Wholesale</a></li>
        <li><a class="nav-cta" href="index.php#order">Order</a></li>
      </ul>
    </nav>
  </header>
