<?php
declare(strict_types=1);
$pageTitle = 'Kyravia — Pakistan ke baalon ki pehchaan';
require_once __DIR__ . '/includes/header.php';
?>

  <main>
    <section class="hero-banner" aria-label="Kyravia banner">
      <img src="assets/banner-silky-strong.jpg" alt="Silky. Strong. Unstoppable. New Kyravia Shampoo" width="1920" height="900" fetchpriority="high">
      <div class="hero-banner-cta">
        <div class="container">
          <p><?= e(SITE_TAGLINE) ?></p>
          <div class="cta-row">
            <a class="btn btn-primary" href="/shop">Shop now</a>
            <a class="btn btn-ghost" href="/product">View product</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="assets/hero-product.jpg" alt="Kyravia Premium Shampoo bottle" width="900" height="1125" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Now launching</p>
          <h2 class="section-title">Premium herbal shampoo, made for Pakistan</h2>
          <p class="section-lead">One hero formula — silky feel, everyday strength, and a clean finish without a crowded product line.</p>
          <div class="price-line">
            <span class="price-now"><?= e(format_price(PRODUCT_PRICE)) ?></span>
            <span class="price-note"><?= e(PRODUCT_SIZE) ?> · Cash on delivery</span>
          </div>
          <div class="cta-row">
            <a class="btn btn-primary" href="/shop">Order online</a>
            <a class="btn btn-ghost" href="/ingredients">See ingredients</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section feature-band">
      <div class="container feature-grid">
        <article class="feature-card reveal">
          <h3>Silky soft</h3>
          <p>A smooth cleanse that leaves hair light and manageable after every wash.</p>
        </article>
        <article class="feature-card reveal">
          <h3>Everyday strong</h3>
          <p>Built for heat, dust, and long days — restore without heaviness.</p>
        </article>
        <article class="feature-card reveal">
          <h3>Herbal care</h3>
          <p>Crafted around trusted botanical notes for a fresh, premium wash.</p>
        </article>
      </div>
    </section>

    <section class="launch-strip">
      <img src="assets/now-launching.jpg" alt="Kyravia now launching" width="1600" height="900" loading="lazy">
      <div class="launch-overlay">
        <div class="container reveal">
          <p class="eyebrow">Campaign</p>
          <h2 class="section-title">Fresh launch energy</h2>
          <p class="section-lead" style="color: var(--champagne); margin-bottom: 1.25rem;">Discover the bottle Pakistan is talking about — shop retail or partner wholesale.</p>
          <a class="btn btn-primary" href="/about">Our story</a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container split reverse">
        <figure class="media-frame reveal">
          <img src="assets/bottle-floating-water.jpg" alt="Kyravia bottle in water" width="900" height="1125" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Freshness</p>
          <h2 class="section-title">Clean rinse. Light finish.</h2>
          <p class="section-lead">Feel the difference of a focused formula — no clutter, just a premium wash that resets hair for the day ahead.</p>
          <a class="btn btn-ghost" href="/how-to-use" style="margin-top: 1.5rem;">How to use</a>
        </div>
      </div>
    </section>

    <section class="section feature-band">
      <div class="container badge-row">
        <figure class="media-frame reveal">
          <img src="assets/badge-best-herbal-shampoo.jpg" alt="Pakistan's Best Herbal Shampoo" width="800" height="1000" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Why Kyravia</p>
          <h2 class="section-title">One product. Clear promise.</h2>
          <ul class="checklist">
            <li>Single SKU focus for consistent quality</li>
            <li>Retail online with phone confirmation</li>
            <li>Wholesale hubs in Rawalpindi, Kashmir &amp; Karachi</li>
          </ul>
          <a class="btn btn-primary" href="/wholesale">Wholesale inquiry</a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="assets/girl-thumbs-up.jpg" alt="Happy Kyravia customer" width="900" height="1125" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Loved by customers</p>
          <h2 class="section-title">Real wash. Real feedback.</h2>
          <p class="section-lead">See why shoppers choose Kyravia for daily restore — then place your order in minutes.</p>
          <div class="cta-row" style="margin-top: 1.5rem;">
            <a class="btn btn-primary" href="/reviews">Read reviews</a>
            <a class="btn btn-ghost" href="/shop">Buy now</a>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
