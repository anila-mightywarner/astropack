<?php
$directory = __DIR__ . '/uploads';

function convertToWebP($dir) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $convertedCount = 0;
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $ext = strtolower($file->getExtension());
            $path = $file->getPathname();
            $webpPath = $path . '.webp';
            
            if (($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png') && !file_exists($webpPath)) {
                $image = null;
                if ($ext === 'jpg' || $ext === 'jpeg') {
                    $image = @imagecreatefromjpeg($path);
                } elseif ($ext === 'png') {
                    $image = @imagecreatefrompng($path);
                    if ($image) {
                        imagepalettetotruecolor($image);
                        imagealphablending($image, true);
                        imagesavealpha($image, true);
                    }
                }
                
                if ($image) {
                    imagewebp($image, $webpPath, 80);
                    imagedestroy($image);
                    $convertedCount++;
                }
            }
        }
    }
    return $convertedCount;
}

$count = convertToWebP($directory);
echo "Successfully converted $count images to WebP.\n";
