<?php

use App\Http\Controllers\ProfileController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;

 // Social Authentication Routes
 Route::get('/login/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
 Route::get('/login/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);
 Route::get('/', function () {
        return view('welcome');
        
    });

    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Book Routes
    Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/book/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');


});

require __DIR__.'/auth.php';
