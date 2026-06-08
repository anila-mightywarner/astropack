<?php
$directory = __DIR__ . '/uploads/sliders';

function convertToMobileWebP($dir) {
    if (!is_dir($dir)) {
        return "Directory not found: $dir";
    }

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $convertedCount = 0;
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $ext = strtolower($file->getExtension());
            $path = $file->getPathname();
            
            // Generate standard WebP if missing
            $webpPath = $path . '.webp';
            if (($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png') && !file_exists($webpPath)) {
                // Just create normal webp
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
                }
            }

            // Generate mobile WebP
            $mobileWebpPath = $path . '.mobile.webp';
            if (($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png') && !file_exists($mobileWebpPath)) {
                $image = null;
                list($width, $height) = getimagesize($path);
                
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
                    // Resize to max 800w for mobile
                    $newWidth = 800;
                    if ($width > $newWidth) {
                        $newHeight = floor($height * ($newWidth / $width));
                    } else {
                        $newWidth = $width;
                        $newHeight = $height;
                    }
                    
                    $resized = imagecreatetruecolor($newWidth, $newHeight);
                    if ($ext === 'png') {
                        imagealphablending($resized, false);
                        imagesavealpha($resized, true);
                        $transparent = imagecolorallocatealpha($resized, 255, 255, 255, 127);
                        imagefilledrectangle($resized, 0, 0, $newWidth, $newHeight, $transparent);
                    }
                    
                    imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    
                    imagewebp($resized, $mobileWebpPath, 80);
                    imagedestroy($image);
                    imagedestroy($resized);
                    $convertedCount++;
                }
            }
        }
    }
    return $convertedCount;
}

$count = convertToMobileWebP($directory);
echo "Successfully converted $count images to Mobile WebP.\n";
