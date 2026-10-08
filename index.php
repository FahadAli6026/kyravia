<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/header.php';
?>

  <main>
    <section class="hero-banner" aria-label="Kyravia best herbal shampoo Pakistan banner">
      <img src="/assets/banner-silky-strong.jpg" alt="Kyravia best herbal shampoo in Pakistan — Silky Strong Unstoppable" width="1920" height="900" fetchpriority="high">
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
          <img src="/assets/hero-product.jpg" alt="Kyravia Premium Herbal Shampoo 400ml — best shampoo bottle Pakistan" width="900" height="1125" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Best herbal shampoo Pakistan</p>
          <h1 class="section-title">Kyravia — premium herbal shampoo made for Pakistan</h1>
          <p class="section-lead">Looking for the best shampoo in Pakistan for everyday silk and strength? Kyravia is a single hero formula — clean rinse, soft finish, no product clutter.</p>
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
      <img src="/assets/now-launching.jpg" alt="Kyravia now launching" width="1600" height="900" loading="lazy">
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
          <img src="/assets/bottle-floating-water.jpg" alt="Kyravia bottle in water" width="900" height="1125" loading="lazy">
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
          <img src="/assets/badge-best-herbal-shampoo.jpg" alt="Pakistan's Best Herbal Shampoo" width="800" height="1000" loading="lazy">
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
          <img src="/assets/girl-thumbs-up.jpg" alt="Happy Kyravia shampoo customer in Pakistan" width="900" height="1125" loading="lazy">
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

    <section class="section feature-band">
      <div class="container reveal">
        <p class="eyebrow">SEO · Pakistan shampoo</p>
        <h2 class="section-title">Why search for Kyravia shampoo?</h2>
        <p class="section-lead" style="max-width: 70ch; margin-bottom: 1.25rem;">
          Kyravia is built for people searching <strong style="color: var(--champagne);">best shampoo in Pakistan</strong>,
          <strong style="color: var(--champagne);">best herbal shampoo</strong>, and <strong style="color: var(--champagne);">Kyravia</strong>.
          One premium 400&nbsp;ml bottle, nationwide online orders, and wholesale hubs in Rawalpindi, Kashmir, and Karachi.
        </p>
        <div class="cta-row">
          <a class="btn btn-primary" href="/faq">Read FAQs</a>
          <a class="btn btn-ghost" href="/shop">Order Kyravia</a>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
