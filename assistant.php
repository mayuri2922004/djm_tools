<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function assistantRespond(int $status, array $body): void
{
    http_response_code($status);
    echo json_encode($body, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    assistantRespond(405, ['error' => 'Use POST to ask a question.']);
}

if ((int) ($_SERVER['CONTENT_LENGTH'] ?? 0) > 4096) {
    assistantRespond(413, ['error' => 'Your question is too long.']);
}

$requestBody = file_get_contents('php://input');
if ($requestBody === false) {
    error_log('Unable to read the Gemini assistant request body.');
    assistantRespond(400, ['error' => 'The question could not be read. Please try again.']);
}
if (strlen($requestBody) > 4096) {
    assistantRespond(413, ['error' => 'Your question is too long.']);
}
$request = json_decode($requestBody, true);
$question = is_array($request) && isset($request['question']) && is_string($request['question'])
    ? trim($request['question'])
    : '';
$questionLength = function_exists('mb_strlen') ? mb_strlen($question, 'UTF-8') : strlen($question);

if ($question === '' || $questionLength > 300) {
    assistantRespond(400, ['error' => 'Enter a question of 1 to 300 characters.']);
}

$apiKey = getenv('GEMINI_API_KEY');
if (!is_string($apiKey) || $apiKey === '') {
    $apiKey = (string) ($_SERVER['GEMINI_API_KEY'] ?? '');
}
if ($apiKey === '' || $apiKey === 'REPLACE_WITH_YOUR_NEW_GEMINI_API_KEY') {
    error_log('The Gemini assistant is unavailable because GEMINI_API_KEY is not configured.');
    assistantRespond(503, ['error' => 'Replace the GEMINI_API_KEY placeholder in .htaccess with a valid Gemini API key, then try again.']);
}

if (!function_exists('curl_init')) {
    error_log('The Gemini assistant requires the PHP cURL extension.');
    assistantRespond(503, ['error' => 'The AI assistant is temporarily unavailable. Please try again later.']);
}

$payload = [
    'systemInstruction' => [
        'parts' => [[
            'text' => 'You are the DJM Tool website assistant. Answer clearly and concisely, including general knowledge questions. For DJM Tool details, use this context: DJM Tool is a project planning and team coordination workspace for structural steel teams. Its website describes project management, employee management, task management, and employee monitoring and tracking. Pricing and availability must be confirmed with the team; do not invent prices, product capabilities, or contact details. If you do not know a DJM Tool-specific fact, say so.',
        ]],
    ],
    'contents' => [[
        'role' => 'user',
        'parts' => [['text' => $question]],
    ]],
    'generationConfig' => [
        'maxOutputTokens' => 512,
        'temperature' => 0.4,
    ],
];

$encodedPayload = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
if ($encodedPayload === false) {
    error_log('Unable to encode the Gemini assistant request.');
    assistantRespond(500, ['error' => 'The assistant could not process your question. Please try again.']);
}

$curl = curl_init('https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent');
if ($curl === false) {
    error_log('Unable to initialize the Gemini assistant request.');
    assistantRespond(503, ['error' => 'The AI assistant is temporarily unavailable. Please try again later.']);
}

if (!curl_setopt_array($curl, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $encodedPayload,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'x-goog-api-key: ' . $apiKey,
    ],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_TIMEOUT => 20,
])) {
    curl_close($curl);
    error_log('Unable to configure the Gemini assistant request.');
    assistantRespond(503, ['error' => 'The AI assistant is temporarily unavailable. Please try again later.']);
}

$responseBody = curl_exec($curl);
$httpStatus = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
$curlError = curl_error($curl);
curl_close($curl);

if ($responseBody === false) {
    error_log('Gemini assistant request failed: ' . $curlError);
    assistantRespond(502, ['error' => 'The AI service could not be reached. Please try again later.']);
}
if ($httpStatus < 200 || $httpStatus >= 300) {
    if ($httpStatus === 401 || $httpStatus === 403) {
        error_log('Gemini assistant rejected the API credentials or model access (HTTP ' . $httpStatus . ').');
        assistantRespond(502, ['error' => 'Google Gemini rejected the API key or model access. Check that the key is valid and Gemini API is enabled for its Google project.']);
    }
    error_log('Gemini assistant returned HTTP status ' . $httpStatus . '.');
    assistantRespond(502, ['error' => 'The AI service could not answer right now. Please try again later.']);
}

$result = json_decode($responseBody, true);
$parts = $result['candidates'][0]['content']['parts'] ?? [];
$answer = '';
if (is_array($parts)) {
    foreach ($parts as $part) {
        if (isset($part['text']) && is_string($part['text'])) {
            $answer .= $part['text'];
        }
    }
}
$answer = trim($answer);

if ($answer === '') {
    assistantRespond(502, ['error' => 'The AI service returned no answer. Please try a different question.']);
}

assistantRespond(200, ['answer' => $answer]);