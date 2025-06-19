<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FileUploadController;


Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

//Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
//});


Route::get('/upload', [FileUploadController::class, 'upload'])->name('file.upload.view');
Route::post('/upload', [FileUploadController::class, 'uploadFile'])->name('file.upload');