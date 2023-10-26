<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes
Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

// item CRUD Routes
Route::get('/items', [itemController::class, 'index'])->name('items.index');
Route::get('/items/create', [itemController::class, 'create'])->name('items.create');
Route::post('/items', [itemController::class, 'store'])->name('items.store');
Route::get('/items/{id}', [itemController::class, 'show'])->name('items.show');
Route::get('/items/{id}/edit', [itemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [itemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [itemController::class, 'destroy'])->name('items.destroy');

// Success Route 
Route::get('/item/success', function () {
    return view('item_success');
})->name('item.success');
