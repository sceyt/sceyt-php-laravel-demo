<?php

use Illuminate\Support\Facades\Route;
use Firebase\JWT\JWT;
use Carbon\Carbon;

Route::get('/get-token/{id?}', function ($userId = "123456") {
    $now = Carbon::now()->timestamp;

    $payload = [
        "sub" => $userId,
        "iat" => $now,
        "nbf" => $now,
        "exp" => $now + (60 * 60 * 6) // Expires in 6 hours
    ];

    // Retrieve the private key from the environment variables
    $privateKey = env('CHAT_PRIVATE_KEY');

    // Ensure the private key is correctly formatted by replacing \n with actual newlines
    $formattedPrivateKey = str_replace('\n', "\n", $privateKey);

    // Check if the private key was successfully loaded
    if (empty($formattedPrivateKey)) {
        return response()->json(['error' => 'Private key not found or improperly formatted'], 500);
    }

    try {
        // Generate the JWT token
        $token = JWT::encode($payload, $privateKey, 'RS256');
    } catch (Exception $e) {
        return response()->json(['error' => 'Failed to encode token: ' . $e->getMessage()], 500);
    }

    return response()->json(['chat_token' => $token]);
});
