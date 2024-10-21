<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::get('/test-config', function () {
    dd(config('payment_methods'));
});
require __DIR__.'/auth.php';
