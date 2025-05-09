<?php
function callApi($url, $method = "GET", $data = [], $token = "")
{
    $ch = curl_init();

    $method = strtoupper($method);
    if (in_array($method, ['POST', 'PUT', 'PATCH'])) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    } elseif ($method === 'GET' && !empty($data)) {
        $url .= '?' . http_build_query($data);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // Verify SSL certificate

    $headers = [
        "Content-Type: application/json",
        "Accept: application/json"
    ];
    if (!empty($token)) {
        $headers[] = "Authorization: Bearer $token";
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($error) {
        return ["error" => $error];
    }

    $decoded = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            "error" => "JSON decode error: " . json_last_error_msg(),
            "raw_response" => $response
        ];
    }

    if ($httpCode >= 400) {
        return [
            "error" => "HTTP error $httpCode",
            "response" => $decoded
        ];
    }

    return $decoded;
}
