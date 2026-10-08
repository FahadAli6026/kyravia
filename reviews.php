<?php
declare(strict_types=1);
$pageTitle = 'Reviews — Kyravia';
require_once __DIR__ . '/includes/header.php';
?>

  <main>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">Reviews</p>
        <h1>What customers are saying</h1>
        <p>Real energy from people trying Kyravia — soft feel, easy routine, premium look.</p>
      </div>
    </section>

    <section class="section">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="assets/girl-thumbs-up.jpg" alt="Kyravia customer review moment" width="900" height="1125">
        </figure>
        <div class="reveal">
          <p class="eyebrow">Community</p>
          <h2 class="section-title">“Finally, one shampoo that feels premium.”</h2>
          <p class="section-lead">Early customers highlight the silky rinse, light finish, and the black-and-gold bottle that stands out in the shower.</p>
          <div class="steps" style="grid-template-columns: 1fr; margin-top: 1.25rem;">
            <blockquote class="step">
              <span class="step-num">REVIEW</span>
              <h3>Soft after first wash</h3>
              <p>“Hair felt lighter and easier to comb. Bottle looks expensive too.”</p>
            </blockquote>
            <blockquote class="step">
              <span class="step-num">REVIEW</span>
              <h3>Simple routine</h3>
              <p>“I don’t need five products — Kyravia covers my daily wash.”</p>
            </blockquote>
            <blockquote class="step">
              <span class="step-num">REVIEW</span>
              <h3>Gift-worthy packaging</h3>
              <p>“Black and gold looks premium. Ordered another for my sister.”</p>
            </blockquote>
          </div>
          <a class="btn btn-primary" href="/shop" style="margin-top: 1.5rem;">Order yours</a>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
