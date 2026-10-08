<?php
declare(strict_types=1);

$srcPath = dirname(__DIR__) . '/assets/logo.png';
$src = imagecreatefrompng($srcPath);
if (!$src) {
    fwrite(STDERR, "Could not read logo\n");
    exit(1);
}

$w = imagesx($src);
$h = imagesy($src);
$cropH = (int) ($h * 0.62);
$size = min($w, $cropH);
$x = (int) (($w - $size) / 2);
$y = 0;

function save_square($src, int $outSize, int $x, int $y, int $size, string $path): void
{
    $dst = imagecreatetruecolor($outSize, $outSize);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
    imagefilledrectangle($dst, 0, 0, $outSize, $outSize, $transparent);
    imagealphablending($dst, true);
    imagecopyresampled($dst, $src, 0, 0, $x, $y, $outSize, $outSize, $size, $size);
    imagesavealpha($dst, true);
    imagepng($dst, $path);
    imagedestroy($dst);
}

$base = dirname(__DIR__) . '/assets';
save_square($src, 32, $x, $y, $size, $base . '/favicon-32.png');
save_square($src, 64, $x, $y, $size, $base . '/favicon.png');
save_square($src, 180, $x, $y, $size, $base . '/favicon-180.png');
imagedestroy($src);
echo "Favicons written\n";
