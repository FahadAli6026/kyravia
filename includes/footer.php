  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand-block">
        <a href="<?= e(url_path()) ?>" aria-label="Kyravia">
          <img src="/assets/logo.png" alt="Kyravia" width="180" height="100">
        </a>
        <p><?= e(SITE_TAGLINE) ?></p>
      </div>
      <div>
        <h3>Explore</h3>
        <ul>
          <li><a href="<?= e(url_path('product')) ?>">Product</a></li>
          <li><a href="<?= e(url_path('ingredients')) ?>">Ingredients</a></li>
          <li><a href="<?= e(url_path('how-to-use')) ?>">How to use</a></li>
          <li><a href="<?= e(url_path('about')) ?>">About</a></li>
          <li><a href="<?= e(url_path('faq')) ?>">FAQ</a></li>
        </ul>
      </div>
      <div>
        <h3>Shop &amp; trade</h3>
        <ul>
          <li><a href="<?= e(url_path('shop')) ?>">Order online</a></li>
          <li><a href="<?= e(url_path('reviews')) ?>">Reviews</a></li>
          <li><a href="<?= e(url_path('wholesale')) ?>">Wholesale</a></li>
        </ul>
      </div>
      <div>
        <h3>Contact</h3>
        <ul>
          <li>Founder: <?= e(FOUNDER_NAME) ?></li>
          <li>
            <a href="tel:<?= e(FOUNDER_PHONE_TEL) ?>"><?= e(FOUNDER_PHONE) ?></a>
          </li>
          <li>WhatsApp:
            <a href="https://wa.me/923102527293" target="_blank" rel="noopener noreferrer"><?= e(FOUNDER_PHONE) ?></a>
          </li>
          <li>Email:
            <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
          </li>
        </ul>
        <h3 style="margin-top: 1.35rem;">Wholesale hubs</h3>
        <ul>
          <li>Rawalpindi</li>
          <li>Kashmir</li>
          <li>Karachi</li>
        </ul>
      </div>
    </div>
    <div class="container footer-bottom">
      <p>
        © <?= date('Y') ?> Kyravia · Founder <?= e(FOUNDER_NAME) ?> ·
        <a href="tel:<?= e(FOUNDER_PHONE_TEL) ?>"><?= e(FOUNDER_PHONE) ?></a> ·
        <a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
      </p>
    </div>
  </footer>
  <script src="/js/main.js?v=introband5"></script>
</body>
</html>
