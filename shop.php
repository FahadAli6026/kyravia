<?php
declare(strict_types=1);
$pageTitle = 'Shop — Order Kyravia';
require_once __DIR__ . '/includes/header.php';

$orderStatus = $_GET['order'] ?? '';
$flashMsg = isset($_GET['msg']) ? (string) $_GET['msg'] : '';
?>

  <main>
    <section class="page-hero">
      <div class="container">
        <p class="eyebrow">Shop</p>
        <h1>Order Kyravia online</h1>
        <p>One product checkout. We confirm by phone before dispatch.</p>
      </div>
    </section>

    <section class="section">
      <div class="container split">
        <figure class="media-frame reveal">
          <img src="assets/hero-product.jpg" alt="Order Kyravia Premium Shampoo" width="900" height="1125">
        </figure>
        <div class="shop-panel reveal">
          <p class="eyebrow"><?= e(PRODUCT_NAME) ?></p>
          <h2 class="section-title"><?= e(format_price(PRODUCT_PRICE)) ?></h2>
          <p class="section-lead" style="margin-bottom: 1rem;"><?= e(PRODUCT_SIZE) ?> · Cash on delivery</p>
          <p class="section-lead" style="margin-bottom: 1.25rem;">
            Questions? Call or WhatsApp
            <a href="tel:<?= e(FOUNDER_PHONE_TEL) ?>" style="color: var(--gold-bright);"><?= e(FOUNDER_PHONE) ?></a>
            (<?= e(FOUNDER_NAME) ?>)
          </p>

          <?php if ($orderStatus === 'ok' && $flashMsg !== ''): ?>
            <div class="alert alert-success" role="status"><?= e($flashMsg) ?></div>
          <?php elseif ($orderStatus === 'error' && $flashMsg !== ''): ?>
            <div class="alert alert-error" role="alert"><?= e($flashMsg) ?></div>
          <?php endif; ?>

          <form class="order-form" action="/process/order" method="post" novalidate>
            <div class="form-row two">
              <div class="form-row">
                <label for="name">Full name</label>
                <input id="name" name="name" type="text" required autocomplete="name" placeholder="Your name">
              </div>
              <div class="form-row">
                <label for="phone">Phone / WhatsApp</label>
                <input id="phone" name="phone" type="tel" required autocomplete="tel" placeholder="03xx xxxxxxx">
              </div>
            </div>
            <div class="form-row two">
              <div class="form-row">
                <label for="email">Email (optional)</label>
                <input id="email" name="email" type="email" autocomplete="email" placeholder="you@email.com">
              </div>
              <div class="form-row">
                <label for="quantity">Quantity</label>
                <select id="quantity" name="quantity" required>
                  <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="<?= $i ?>"<?= $i === 1 ? ' selected' : '' ?>><?= $i ?> × <?= e(format_price(PRODUCT_PRICE * $i)) ?></option>
                  <?php endfor; ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <label for="city">City</label>
              <input id="city" name="city" type="text" required autocomplete="address-level2" placeholder="Delivery city">
            </div>
            <div class="form-row">
              <label for="address">Delivery address</label>
              <textarea id="address" name="address" required placeholder="House, street, area"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit order</button>
          </form>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
