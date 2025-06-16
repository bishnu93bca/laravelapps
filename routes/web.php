<?php

use App\Http\Controllers\Frontend\UsersController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Frontend\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AdminController;
use App\Http\Middleware\IsAdmin;


Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home', function () {
    return view('frontend.home');
});



// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/profile', [AuthController::class, 'show'])->name('profile.show');



// Dashboard Route
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tickets', TicketController::class)->except(['edit', 'update', 'destroy']);
    Route::post('tickets/{id}/respond', [TicketController::class, 'respond'])->name('tickets.respond');
    Route::post('tickets/{id}/close', [TicketController::class, 'close'])->name('tickets.close');
});


Route::resource('/users', UsersController::class);

// Route Group with Prefix and Middleware
// Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
//     // Admin Dashboard
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//     // Manage Users
//     Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
//     Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
// });

// // Route Group for Users
// Route::prefix('user')->middleware(['auth'])->group(function () {
//     // User Dashboard
//     Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

//     // Update Profile
//     Route::put('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
// });

// Route::controller(UserController::class)->group(function () {
//     Route::get('/dashboard', 'dashboard')->name('user.dashboard');
//     Route::get('/profile', 'profile')->name('user.profile');
//     Route::put('/profile', 'updateProfile')->name('user.profile.update');
// });
// Route::group([
//     'prefix' => 'admin',         // URL Prefix
//     'middleware' => ['auth', 'isAdmin'], // Middleware
// ], function () {
//     Route::controller(AdminController::class)->group(function () {
//         Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
//         Route::get('/users', 'users')->name('admin.users');
//         Route::post('/users', 'storeUser')->name('admin.users.store');
//         Route::delete('/users/{id}', 'deleteUser')->name('admin.users.delete');
//     });
// });

Route::prefix('admin')
    ->middleware(['auth','role'])
    ->controller(AdminController::class)
    ->group(function () {

         Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        // Route::get('/users', 'users')->name('admin.users');
        // Route::post('/users', 'storeUser')->name('admin.users.store');
        // Route::delete('/users/{id}', 'deleteUser')->name('admin.users.delete');
    });
// Route::prefix('admin')
//     ->middleware([IsAdmin::class])
//     ->controller(AdminController::class)
//     ->group(function () {

//          Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
//         // Route::get('/users', 'users')->name('admin.users');
//         // Route::post('/users', 'storeUser')->name('admin.users.store');
//         // Route::delete('/users/{id}', 'deleteUser')->name('admin.users.delete');
//     });

