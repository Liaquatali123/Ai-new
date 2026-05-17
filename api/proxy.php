<?php
header('Content-Type: application/json');

// Get the prompt from the request
$prompt = $_GET['prompt'] ?? '';
$key = $_GET['key'] ?? 'USAGIWK';

if (!$prompt) {
    echo json_encode(['error' => 'Prompt is required']);
    http_response_code(400);
    exit;
}

// Forward the request to the image generation service
$url = 'https://gold-newt-367030.hostingersite.com/nano.php?' . http_build_query([
    'key' => $key,
    'prompt' => $prompt
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// Set headers to mimic a real browser request
$headers = [
    'Accept: application/json',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false) {
    echo json_encode(['error' => 'Failed to fetch from image generation service']);
    http_response_code(500);
    exit;
}

// Check if we got a valid JSON response
$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE || !isset($data['url'])) {
    // If we got HTML instead of JSON, it's likely a Cloudflare challenge
    echo json_encode(['error' => 'Service temporarily unavailable due to security measures']);
    http_response_code(503);
    exit;
}

// Return the data from the image generation service
echo json_encode($data);
?>