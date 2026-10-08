<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

header('Content-Type: text/plain; charset=UTF-8');
echo "User-agent: *\n";
echo "Allow: /\n";
echo "Disallow: /process/\n";
echo "Disallow: /data/\n";
echo "\n";
echo 'Sitemap: ' . absolute_url('sitemap.xml') . "\n";
