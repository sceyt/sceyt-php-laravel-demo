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

    $privateKey = file_get_contents('../sceyt-chat-app-private-key.cer');

    $signOptions = [
        'algorithm' => 'RS256'
    ];

    $token = JWT::encode($payload, $privateKey, 'RS256');

    return response()->json(['chat_token' => $token]);
});
