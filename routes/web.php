<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard', ['type_menu' => 'dashboard']);
        })->name('dashboard');
        Route::get('/blank-page', function () {
            return view('pages.admin.blank-page', ['type_menu' => '']);
        })->name('blank-page');
        Route::get('/auth/user/confirm-password', function () {
            return view('pages.auth.confirm-password', ['type_menu' => '']);
        })->name('confirm-password');

        // Profile Resource
        Route::prefix('/profile')->group(function () {
            Route::get('/', [ProfilController::class, 'index'])->name('profile');
            // Route::put('/information', [ProfileInformatio]);
            Route::post('/change-password', [ProfilController::class, 'updatePassword'])->name('profile.change.password');
        });

        // User Resource
        Route::prefix('/user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user');
        });
    });
});



// Route::prefix('auth')->group(function () {
//     Route::get('/login', [AuthenticationController::class, 'getUserLocation'])->name('auth.login');
//     Route::get('/register', [AuthenticationController::class, 'index'])->name('auth.register');
//     Route::get('/forgot', [AuthenticationController::class, 'forgotPassword'])->name('auth.forgot');
// });
