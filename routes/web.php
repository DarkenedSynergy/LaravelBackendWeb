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

// Public user profile route
Route::get('/user/{user}', [ProfileController::class, 'showPublic'])->name('user.show');

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

    // User Management (excluding 'create' and 'store' routes)
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::resource('users', UserController::class)->except(['create', 'store']);
    // Show form to create a new user
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');

    // Store the new user after form submission
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');

});

require __DIR__.'/auth.php';
