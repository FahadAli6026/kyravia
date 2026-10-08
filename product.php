<?php
declare(strict_types=1);
$pageTitle = 'Product — Kyravia Premium Herbal Shampoo';
require_once __DIR__ . '/includes/header.php';
?>

  <main>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">Product</p>
        <h1><?= e(PRODUCT_NAME) ?></h1>
        <p>Our only retail shampoo — <?= e(PRODUCT_SIZE) ?> of premium herbal care for everyday silk and strength.</p>
      </div>
    </section>

    <section class="section">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="assets/hero-product.jpg" alt="Kyravia Premium Shampoo" width="900" height="1125">
        </figure>
        <div class="reveal">
          <p class="eyebrow"><?= e(PRODUCT_SIZE) ?></p>
          <h2 class="section-title">Silky. Strong. Unstoppable.</h2>
          <p class="section-lead">A single focused formula for hair that lives through heat, dust, and long days — soft feel, clean rinse, premium finish.</p>
          <div class="price-line">
            <span class="price-now"><?= e(format_price(PRODUCT_PRICE)) ?></span>
            <span class="price-note">Cash on delivery available</span>
          </div>
          <ul class="checklist">
            <li>Matte black bottle · gold pump · 400 ml</li>
            <li>Daily restore for all common hair needs</li>
            <li>Confirmed by phone before dispatch</li>
          </ul>
          <a class="btn btn-primary" href="/shop">Shop this product</a>
        </div>
      </div>
    </section>

    <section class="section feature-band">
      <div class="container split reverse">
        <figure class="media-frame reveal">
          <img src="assets/model-campaign.jpg" alt="Kyravia campaign" width="900" height="1125" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">The result</p>
          <h2 class="section-title">Hair that looks cared for</h2>
          <p class="section-lead">Kyravia is built around one promise: a premium wash that feels salon-clean at home — without stacking a dozen bottles in your shower.</p>
          <a class="btn btn-ghost" href="/ingredients">Explore ingredients</a>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
