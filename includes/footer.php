  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand-block">
        <a href="<?= e(url_path()) ?>" aria-label="Kyravia">
          <img src="/assets/logo.png" alt="Kyravia" width="180" height="100">
        </a>
        <p><?= e(SITE_TAGLINE) ?></p>
        <div class="footer-social">
          <a class="social-icon social-facebook" href="<?= e(FACEBOOK_URL) ?>" target="_blank" rel="noopener noreferrer" aria-label="Kyravia on Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
              <path fill="currentColor" d="M22 12.07C22 6.48 17.52 2 11.93 2S1.86 6.48 1.86 12.07c0 5.02 3.66 9.18 8.44 9.93v-7.03H7.9v-2.9h2.4V9.84c0-2.37 1.4-3.69 3.56-3.69 1.03 0 2.12.19 2.12.19v2.34h-1.2c-1.18 0-1.55.74-1.55 1.49v1.79h2.64l-.42 2.9h-2.22V22c4.78-.75 8.44-4.91 8.44-9.93z"/>
            </svg>
          </a>
        </div>
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
  <script src="/js/main.js?v=fblogo9"></script>
</body>
</html>
