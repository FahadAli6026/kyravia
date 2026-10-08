<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/header.php';
?>

  <main>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">About</p>
        <h1><?= e(SITE_TAGLINE) ?></h1>
        <p>Kyravia is a single-product herbal shampoo brand built for everyday hair across Pakistan.</p>
      </div>
    </section>

    <section class="section">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="/assets/model-campaign.jpg" alt="Kyravia brand campaign" width="900" height="1125">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Our approach</p>
          <h2 class="section-title">One brand. One bottle. Clear identity.</h2>
          <p class="section-lead">Instead of a crowded shelf of lookalikes, Kyravia focuses on a single premium shampoo — so every wash feels consistent, and every partner knows exactly what they are stocking.</p>
          <ul class="checklist">
            <li>Premium black &amp; gold identity</li>
            <li>Herbal-inspired daily restore formula</li>
            <li>Retail online + wholesale supply network</li>
          </ul>
          <p class="section-lead" style="margin-top: 1.25rem;">
            Founder: <strong style="color: var(--champagne);"><?= e(FOUNDER_NAME) ?></strong><br>
            Phone / WhatsApp:
            <a href="tel:<?= e(FOUNDER_PHONE_TEL) ?>" style="color: var(--gold-bright);"><?= e(FOUNDER_PHONE) ?></a>
          </p>
        </div>
      </div>
    </section>

    <section class="section feature-band">
      <div class="container split reverse">
        <figure class="media-frame reveal">
          <img src="/assets/now-launching.jpg" alt="Kyravia launch" width="900" height="1125" loading="lazy">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Launch</p>
          <h2 class="section-title">Built to grow with Pakistan</h2>
          <p class="section-lead">From first retail orders to wholesale partners in Rawalpindi, Kashmir, and Karachi — Kyravia is designed to scale without losing its single-product focus.</p>
          <a class="btn btn-primary" href="/wholesale">Partner with us</a>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
