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

Live site: **https://www.kyravia.com/**

1. Keep `SITE_URL` as `https://www.kyravia.com` in `includes/config.php`
2. Submit `https://www.kyravia.com/sitemap.xml` in [Google Search Console](https://search.google.com/search-console)

Update contact/price in `includes/config.php`.
