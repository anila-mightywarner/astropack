<?php
$html = file_get_contents('https://www.astropackgulf.com/contact');
preg_match('/name="csrf-token" content="(.*?)"/', $html, $matches);
$csrf = $matches[1] ?? '';
preg_match('/PHPSESSID=(.*?);/', implode(" ", $http_response_header), $sess);
$cookie = "PHPSESSID=" . ($sess[1] ?? '');

$data = http_build_query([
    'name' => 'Anila Paul',
    'email' => 'info@astropackgulf.com',
    'phone' => '9632587412',
    'company' => 'testing',
    'message' => 'testing',
    'secondCaptcha' => 'TEST_TOKEN',
    '_csrf-frontend' => $csrf
]);

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\nCookie: $cookie\r\n",
        'method'  => 'POST',
        'content' => $data,
        'ignore_errors' => true
    ]
];
$context  = stream_context_create($options);
$result = file_get_contents('https://www.astropackgulf.com/site/contact-enquiry', false, $context);
echo "RESPONSE: " . $result;
