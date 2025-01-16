<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

// News Routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Dashboard Route (for authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// FAQ Routes
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index'); // Public FAQ page

// Public Routes for Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('users.show');

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
     // admin faq management
     Route::get('/admin/faq', [FaqController::class, 'adminIndex'])->name('admin.faq.index');
         Route::get('/admin/faq/create', [FaqController::class, 'create'])->name('admin.faq.create');
         Route::post('/news', [NewsController::class, 'store'])->name('news.store');
         Route::get('/admin/faq/{faq}/edit', [FaqController::class, 'edit'])->name('admin.faq.edit');
         Route::put('/admin/faq/{faq}', [FaqController::class, 'update'])->name('admin.faq.update');
         Route::delete('/admin/faq/{faq}', [FaqController::class, 'destroy'])->name('admin.faq.delete');
    // Admin News management (create, edit, update, delete)
       Route::get('/admin/news', [NewsController::class, 'index'])->name('admin.news.index');
       Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create'); // Create news (admin only)
       Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store'); // Store news (admin only)
       Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit'); // Edit news (admin only)
       Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('admin.news.update'); // Update news (admin only)
       Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.delete'); // Delete news (admin only)


    // Tag Management
    Route::resource('tags', TagController::class)->except(['show']);

    // Admin Routes for User Management
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});



require __DIR__.'/auth.php';
