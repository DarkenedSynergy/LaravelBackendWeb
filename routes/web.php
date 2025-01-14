<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // News resource routes
    Route::resource('news', NewsController::class)->only(['index', 'show']);

    // Admin-only routes
    Route::middleware('admin')->group(function () {
        // Admin Dashboard
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // News management (voor admins: bewerken, toevoegen, verwijderen)
        Route::resource('news', NewsController::class)->except(['index', 'show']);
        Route::delete('/news/{news}', [NewsController::class, 'delete'])->name('news.delete');

        // Tag management
        Route::resource('tags', TagController::class)->except(['show']);

        // Gebruikersbeheer
        Route::resource('users', UserController::class);

        // Toon het formulier om een nieuwe gebruiker toe te voegen
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');

            // Sla de nieuwe gebruiker op
        Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    });
});

require __DIR__.'/auth.php';
