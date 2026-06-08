<?php

function minifyViaAPI($url, $content) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
        CURLOPT_POSTFIELDS => http_build_query(["input" => $content])
    ]);
    $minified = curl_exec($ch);
    curl_close($ch);
    return $minified;
}

$cssFiles = [
    __DIR__ . '/assets/css/stylesheet.css',
    __DIR__ . '/assets/css/bootstrap.css'
];

foreach ($cssFiles as $file) {
    if (file_exists($file)) {
        echo "Minifying CSS: " . basename($file) . "...\n";
        $content = file_get_contents($file);
        $minified = minifyViaAPI('https://www.toptal.com/developers/cssminifier/api/raw', $content);
        if ($minified && strlen($minified) > 0) {
            $minFile = str_replace('.css', '.min.css', $file);
            file_put_contents($minFile, $minified);
            echo "Success! " . basename($file) . " compressed to " . basename($minFile) . "\n";
        } else {
            echo "Failed to minify " . basename($file) . "\n";
        }
    }
}

$jsFiles = [
    __DIR__ . '/assets/js/script.js',
    __DIR__ . '/assets/js/bootstrap.js'
];

foreach ($jsFiles as $file) {
    if (file_exists($file)) {
        echo "Minifying JS: " . basename($file) . "...\n";
        $content = file_get_contents($file);
        $minified = minifyViaAPI('https://www.toptal.com/developers/javascript-minifier/api/raw', $content);
        if ($minified && strlen($minified) > 0) {
            $minFile = str_replace('.js', '.min.js', $file);
            file_put_contents($minFile, $minified);
            echo "Success! " . basename($file) . " compressed to " . basename($minFile) . "\n";
        } else {
            echo "Failed to minify " . basename($file) . "\n";
        }
    }
}
