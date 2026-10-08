<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=UTF-8');

$today = date('Y-m-d');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($SITEMAP_PAGES as $slug => $meta): ?>
  <url>
    <loc><?= htmlspecialchars(absolute_url($slug), ENT_XML1) ?></loc>
    <lastmod><?= $today ?></lastmod>
    <changefreq><?= htmlspecialchars($meta['changefreq'], ENT_XML1) ?></changefreq>
    <priority><?= htmlspecialchars($meta['priority'], ENT_XML1) ?></priority>
  </url>
<?php endforeach; ?>
</urlset>
