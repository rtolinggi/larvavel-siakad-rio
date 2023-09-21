<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard', ['type_menu' => 'dashboard']);
        })->name('dashboard');
    });
});


// Route::prefix('auth')->group(function () {
//     Route::get('/login', [AuthenticationController::class, 'getUserLocation'])->name('auth.login');
//     Route::get('/register', [AuthenticationController::class, 'index'])->name('auth.register');
//     Route::get('/forgot', [AuthenticationController::class, 'forgotPassword'])->name('auth.forgot');
// });
