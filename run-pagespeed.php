<?php
$url = 'https://www.astropackgulf.com/';
$apiUrl = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . urlencode($url) . '&strategy=mobile';

$response = file_get_contents($apiUrl);
if ($response !== false) {
    $data = json_decode($response, true);
    
    $lighthouse = $data['lighthouseResult'];
    $metrics = $lighthouse['audits']['metrics']['details']['items'][0];
    
    echo "--- Lighthouse Mobile Score: " . ($lighthouse['categories']['performance']['score'] * 100) . " ---\n\n";
    
    echo "Core Metrics:\n";
    echo "FCP: " . $lighthouse['audits']['first-contentful-paint']['displayValue'] . "\n";
    echo "LCP: " . $lighthouse['audits']['largest-contentful-paint']['displayValue'] . "\n";
    echo "TBT: " . $lighthouse['audits']['total-blocking-time']['displayValue'] . "\n";
    echo "CLS: " . $lighthouse['audits']['cumulative-layout-shift']['displayValue'] . "\n";
    echo "Speed Index: " . $lighthouse['audits']['speed-index']['displayValue'] . "\n\n";
    
    echo "Opportunities (Bottlenecks):\n";
    foreach ($lighthouse['audits'] as $id => $audit) {
        if (isset($audit['details']['type']) && $audit['details']['type'] === 'opportunity' && $audit['score'] < 0.9) {
            echo "- " . $audit['title'] . ": " . (isset($audit['displayValue']) ? $audit['displayValue'] : 'Impact: ' . $audit['score']) . "\n";
        }
    }
    
    echo "\nDiagnostics:\n";
    foreach ($lighthouse['audits'] as $id => $audit) {
        if (isset($audit['details']['type']) && in_array($audit['details']['type'], ['table', 'debugdata']) && $audit['score'] < 0.9 && !isset($audit['details']['items'][0]['node'])) {
            // Some diagnostics don't have straightforward display values, so we just print the title.
            // But let's grab specific useful ones:
            if (in_array($id, ['mainthread-work-breakdown', 'bootup-time', 'dom-size', 'server-response-time'])) {
                echo "- " . $audit['title'] . ": " . (isset($audit['displayValue']) ? $audit['displayValue'] : '') . "\n";
            }
        }
    }
} else {
    echo "Failed to fetch PageSpeed data.\n";
}
