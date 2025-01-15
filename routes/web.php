<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// News resource routes (index and show are available for everyone)
Route::resource('news', NewsController::class)->only(['index', 'show']);

 // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Admin-only routes for News creation and management
Route::middleware('admin')->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin News management (create, edit, update, delete)
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::resource('news', NewsController::class)->except(['index', 'show']);
    Route::delete('/news/{news}', [NewsController::class, 'delete'])->name('news.delete');

    // Tag management
    Route::resource('tags', TagController::class)->except(['show']);

    // User management (excluding 'create' and 'store' routes from the resource route)
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Exclude 'create' and 'store' from the default users resource route
    Route::resource('users', UserController::class)->except(['create', 'store']);
});

require __DIR__.'/auth.php';
