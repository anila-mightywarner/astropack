<?php
/**
 * Batch convert JPEG/PNG uploads to WebP (run from CLI: php scripts/convert-images-webp.php)
 */
$root = dirname(__DIR__);
$dirs = [$root . '/uploads', $root . '/assets/images'];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        continue;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }
        $path = $file->getPathname();
        if (!preg_match('/\.(jpe?g|png)$/i', $path)) {
            continue;
        }
        $webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $path);
        if (is_file($webp)) {
            continue;
        }
        $img = null;
        if (preg_match('/\.png$/i', $path)) {
            $img = @imagecreatefrompng($path);
            if ($img && !imageistruecolor($img)) {
                imagepalettetotruecolor($img);
            }
            if ($img) {
                imagealphablending($img, true);
                imagesavealpha($img, true);
            }
        } else {
            $img = @imagecreatefromjpeg($path);
        }
        if (!$img) {
            continue;
        }
        imagewebp($img, $webp, 82);
        imagedestroy($img);
        echo "Created: $webp\n";
    }
}

echo "Done.\n";
