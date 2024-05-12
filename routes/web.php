<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('defaultblade');
})->name('index');


Route::get('/welcome', function () {
    return view('defaultblade');
})->name('defaultblade');
Route::get('/chat', function () {
    return view('sceytchat');
})->name('sceytchat');
