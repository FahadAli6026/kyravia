# Kyravia

Premium herbal shampoo brand site (HTML/CSS + PHP).

Tagline: **Pakistan ke baalon ki pehchaan**

## Run locally

```bash
php -S localhost:8000 router.php
```

## Pages (clean URLs)

- `/` — Home
- `/product` — Product
- `/ingredients` — Ingredients
- `/how-to-use` — How to use
- `/about` — About
- `/reviews` — Reviews
- `/wholesale` — Wholesale
- `/shop` — Online order

Orders & wholesale forms email **kyraviashampoo@gmail.com** (needs working PHP `mail()` / SMTP on the server).

## SEO

On-page SEO is ready (titles, sitemap, FAQ schema). Google only indexes **public hosted** sites.

1. Host this PHP site on a live domain
2. Set `SITE_URL` in `includes/config.php` (e.g. `https://yourdomain.com`)
3. Submit `https://yourdomain.com/sitemap.xml` in [Google Search Console](https://search.google.com/search-console)

Update contact/price in `includes/config.php`.
