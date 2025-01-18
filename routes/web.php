<?php

use App\Http\Controllers\Web\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'message' => 'Hello from Laravel!',
    ]);
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');


Route::prefix('/admin')->group(function () {

});
