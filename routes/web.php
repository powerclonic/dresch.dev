<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Portfolio');
});

Route::post('/message', [MessageController::class, 'store']);
