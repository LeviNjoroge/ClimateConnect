<?php
require_once(__DIR__ . '/../config.php');
header("Content-Type: application/json");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$data = json_decode(file_get_contents("php://input"), true);
$user_message = $data['message'] ?? 'Hello';

// Make API request
$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . OPENAI_API_KEY,
    "Content-Type: application/json"
]);

$post_data = [
    "model" => "gpt-3.5-turbo",
    "messages" => [["role" => "user", "content" => $user_message]]
];

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));

$response = curl_exec($ch);

// Add error checking
if ($response === false) {
    echo json_encode([
        "error" => true,
        "reply" => "cURL Error: " . curl_error($ch)
    ]);
    curl_close($ch);
    exit;
}

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Decode response
$response_data = json_decode($response, true);

// Check for JSON decode errors
if (json_last_encode_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "error" => true,
        "reply" => "JSON Error: " . json_last_error_msg()
    ]);
    exit;
}

if ($http_code !== 200) {
    echo json_encode([
        "error" => true,
        "reply" => "API Error: " . ($response_data['error']['message'] ?? 'Unknown error'),
        "status" => $http_code
    ]);
    exit;
}

if (isset($response_data['choices'][0]['message']['content'])) {
    echo json_encode([
        "error" => false,
        "reply" => $response_data['choices'][0]['message']['content']
    ]);
} else {
    echo json_encode([
        "error" => true,
        "reply" => "Unexpected API response structure"
    ]);
}
?>
