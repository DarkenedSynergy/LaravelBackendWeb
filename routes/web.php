<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// News Routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index'); // News index
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create'); // Create news
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show'); // Show specific news

// Dashboard Route (for authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// FAQ Routes
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index'); // Public FAQ page

// Admin-only FAQ Routes
Route::middleware('admin')->group(function () {
    Route::get('/admin/faq', [FaqController::class, 'index'])->name('admin.faq.index');
    Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/{faq}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/faq/{faq}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faq/{faq}', [FaqController::class, 'destroy'])->name('faq.delete');
});


// Public Routes for Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

// Profile management routes (for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only Routes (Category, News, Tags, Users)
Route::middleware('admin')->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Category Management Routes
    Route::resource('categories', CategoryController::class);

    // News management (create, edit, update, delete)
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::resource('news', NewsController::class)->except(['index', 'show']);
    Route::delete('/news/{news}', [NewsController::class, 'delete'])->name('news.delete');

    // Tag Management
    Route::resource('tags', TagController::class)->except(['show']);

    // Admin Routes for User Management
    Route::middleware('admin')->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create'); // Admin-specific route for creating users
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

});

require __DIR__.'/auth.php';
