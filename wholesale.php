<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/header.php';

$wholesaleStatus = $_GET['wholesale'] ?? '';
$flashMsg = isset($_GET['msg']) ? (string) $_GET['msg'] : '';
?>

  <main>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">Wholesale</p>
        <h1>Supply across Pakistan</h1>
        <p>Stock Kyravia for your shop or salon. Wholesale from Rawalpindi, Kashmir, and Karachi.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <ul class="city-list reveal">
          <?php foreach ($WHOLESALE_CITIES as $city => $note): ?>
            <li class="city-item">
              <h2 class="city-name"><?= e($city) ?></h2>
              <p class="city-note"><?= e($note) ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>

    <section class="section feature-band">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="/assets/badge-best-herbal-shampoo.jpg" alt="Kyravia wholesale product" width="800" height="1000" loading="lazy">
        </figure>
        <div class="shop-panel reveal">
          <p class="eyebrow">Inquiry</p>
          <h2 class="section-title">Request pricing</h2>
          <p class="section-lead" style="margin-bottom: 1.25rem;">Share your hub and volume. We reply with MOQ, rates, and delivery windows.</p>
          <p class="section-lead" style="margin-bottom: 1.25rem;">
            Direct line:
            <a href="tel:<?= e(FOUNDER_PHONE_TEL) ?>" style="color: var(--gold-bright);"><?= e(FOUNDER_PHONE) ?></a>
            · <?= e(FOUNDER_NAME) ?>
          </p>

          <?php if ($wholesaleStatus === 'ok' && $flashMsg !== ''): ?>
            <div class="alert alert-success" role="status"><?= e($flashMsg) ?></div>
          <?php elseif ($wholesaleStatus === 'error' && $flashMsg !== ''): ?>
            <div class="alert alert-error" role="alert"><?= e($flashMsg) ?></div>
          <?php endif; ?>

          <form class="order-form" action="/process/wholesale" method="post" novalidate>
            <div class="form-row two">
              <div class="form-row">
                <label for="w-name">Your name</label>
                <input id="w-name" name="name" type="text" required placeholder="Contact person">
              </div>
              <div class="form-row">
                <label for="business">Business / shop</label>
                <input id="business" name="business" type="text" required placeholder="Shop or salon name">
              </div>
            </div>
            <div class="form-row two">
              <div class="form-row">
                <label for="w-phone">Phone</label>
                <input id="w-phone" name="phone" type="tel" required placeholder="03xx xxxxxxx">
              </div>
              <div class="form-row">
                <label for="w-email">Email (optional)</label>
                <input id="w-email" name="email" type="email" placeholder="orders@shop.com">
              </div>
            </div>
            <div class="form-row">
              <label for="hub">Preferred hub</label>
              <select id="hub" name="hub" required>
                <option value="" disabled selected>Select a city</option>
                <?php foreach (array_keys($WHOLESALE_CITIES) as $city): ?>
                  <option value="<?= e($city) ?>"><?= e($city) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-row">
              <label for="message">Requirements</label>
              <textarea id="message" name="message" required placeholder="Estimated monthly volume, delivery area…"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Send inquiry</button>
          </form>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
