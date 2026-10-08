<?php
declare(strict_types=1);

$pageTitle = 'Kyravia — Daily Restore Shampoo';
require_once __DIR__ . '/includes/header.php';

$orderStatus = $_GET['order'] ?? '';
$wholesaleStatus = $_GET['wholesale'] ?? '';
$flashMsg = isset($_GET['msg']) ? (string) $_GET['msg'] : '';
?>

  <main>
    <section class="hero" aria-label="Kyravia hero">
      <div class="hero-grid">
        <div class="hero-copy">
          <h1 class="hero-brand">Kyravia</h1>
          <p class="hero-headline">One shampoo. Clean restore, every wash.</p>
          <p class="hero-support">A single formula for daily strength and soft shine — made for hair that lives through heat, dust, and long days.</p>
          <div class="cta-row">
            <a class="btn btn-primary" href="#order">Order online</a>
            <a class="btn btn-ghost" href="#wholesale">Wholesale supply</a>
          </div>
        </div>
        <div class="hero-visual" aria-hidden="true">
          <div class="bottle-stage">
            <div class="bottle-glow"></div>
            <div class="bottle">
              <div class="bottle-liquid"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section story">
      <div class="container story-grid">
        <article class="story-item reveal">
          <h3>One product focus</h3>
          <p>We make a single shampoo so every bottle stays consistent — no line clutter, no diluted formulas.</p>
        </article>
        <article class="story-item reveal">
          <h3>Daily restore</h3>
          <p>Gentle cleanse with a botanical base that leaves hair calm, light, and ready for the next day.</p>
        </article>
        <article class="story-item reveal">
          <h3>Pakistan supply</h3>
          <p>Retail online nationwide. Wholesale stocked from Rawalpindi, Kashmir, and Karachi.</p>
        </article>
      </div>
    </section>

    <section class="section product" id="product">
      <div class="container product-layout">
        <div class="product-panel reveal" aria-hidden="true">
          <div class="bottle-stage">
            <div class="bottle-glow"></div>
            <div class="bottle">
              <div class="bottle-liquid"></div>
            </div>
          </div>
        </div>

        <div class="product-meta reveal">
          <p class="section-eyebrow">The product</p>
          <h2 class="section-title"><?= e(PRODUCT_NAME) ?></h2>
          <p class="section-lead">Our only retail SKU — <?= e(PRODUCT_SIZE) ?> of daily restore shampoo for all hair types that need a clean, soft finish.</p>

          <div class="product-price">
            <span class="price-now"><?= e(format_price(PRODUCT_PRICE)) ?></span>
            <span class="price-note"><?= e(PRODUCT_SIZE) ?> · COD available</span>
          </div>

          <ul class="product-points">
            <li>Sulfate-conscious cleanse for everyday use</li>
            <li>Light botanical scent, no heavy residue</li>
            <li>Ships across Pakistan from our supply network</li>
          </ul>

          <a class="btn btn-dark" href="#order">Buy <?= e(PRODUCT_NAME) ?></a>
        </div>
      </div>
    </section>

    <section class="section product" id="order" style="padding-top: 0;">
      <div class="container" style="max-width: 720px;">
        <div class="reveal">
          <p class="section-eyebrow">Online order</p>
          <h2 class="section-title">Place your order</h2>
          <p class="section-lead">One product, straightforward checkout. We confirm by phone before dispatch.</p>
        </div>

        <?php if ($orderStatus === 'ok' && $flashMsg !== ''): ?>
          <div class="alert alert-success" role="status"><?= e($flashMsg) ?></div>
        <?php elseif ($orderStatus === 'error' && $flashMsg !== ''): ?>
          <div class="alert alert-error" role="alert"><?= e($flashMsg) ?></div>
        <?php endif; ?>

        <form class="order-form reveal" action="process/order.php" method="post" novalidate>
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
                  <option value="<?= $i ?>"<?= $i === 1 ? ' selected' : '' ?>><?= $i ?> bottle<?= $i > 1 ? 's' : '' ?> — <?= e(format_price(PRODUCT_PRICE * $i)) ?></option>
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
            <textarea id="address" name="address" required placeholder="House / street / area"></textarea>
          </div>

          <button class="btn btn-primary" type="submit">Submit order</button>
        </form>
      </div>
    </section>

    <section class="section wholesale" id="wholesale">
      <div class="container">
        <div class="reveal">
          <p class="section-eyebrow">Wholesale</p>
          <h2 class="section-title">Supply hubs across Pakistan</h2>
          <p class="section-lead">Stock Kyravia for your shop or salon. We supply wholesale from three hubs — pick the nearest and send an inquiry.</p>
        </div>

        <ul class="city-list">
          <?php foreach ($WHOLESALE_CITIES as $city => $note): ?>
            <li class="city-item reveal">
              <h3 class="city-name"><?= e($city) ?></h3>
              <p class="city-note"><?= e($note) ?></p>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="wholesale-form-wrap reveal">
          <div>
            <h3 class="section-title" style="font-size: 1.85rem;">Request wholesale pricing</h3>
            <p class="section-lead">Tell us your hub and volume needs. We reply with MOQ, rates, and delivery windows.</p>
          </div>

          <div>
            <?php if ($wholesaleStatus === 'ok' && $flashMsg !== ''): ?>
              <div class="alert alert-success" role="status"><?= e($flashMsg) ?></div>
            <?php elseif ($wholesaleStatus === 'error' && $flashMsg !== ''): ?>
              <div class="alert alert-error" role="alert"><?= e($flashMsg) ?></div>
            <?php endif; ?>

            <form class="order-form" action="process/wholesale.php" method="post" novalidate>
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
                <label for="message">What do you need?</label>
                <textarea id="message" name="message" required placeholder="Estimated monthly bottles, delivery area, etc."></textarea>
              </div>

              <button class="btn btn-primary" type="submit">Send inquiry</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
