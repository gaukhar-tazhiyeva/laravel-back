<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::resource('users', UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('users/{user}/assign', [UserController::class, 'assignForm'])->name('users.assign');
    Route::post('users/{user}/assign', [UserController::class, 'assignStore'])->name('users.assign.store');

});

Route::get('/login', function () {
    return response()->json(['message' => 'Not authenticated.'], 401);
})->name('login');

Route::get('/admin-only', function () {
    return 'Добро пожаловать, админ!';
})->middleware('is_admin');

Route::resource('products', ProductController::class);
Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';