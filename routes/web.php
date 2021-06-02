<?php

use App\Http\Livewire\ShowPost;
use Illuminate\Support\Facades\Route;

/* Home Routes */
Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home');
})->name('home');

/* Admin Routes */
Route::middleware(['auth:sanctum', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', function () {
            return view('admin.posts.index');
        })->name('posts');

        Route::get('/new', function () {
            return view('admin.posts.create');
        })->name('posts.new');

        Route::get('/edit/{post}', function () {
            return view('admin.posts.edit');
        })->name('posts.edit');
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', function () {
            return view('admin.categories.index');
        })->name('categories');

        Route::get('/new', function () {
            return view('admin.categories.create');
        })->name('categories.new');

        Route::get('/edit/{category}', function () {
            return view('admin.categories.edit');
        })->name('categories.edit');
    });
});

/* Post Routes */
Route::get('/posts/{post}', ShowPost::class)->name('posts.show');

Route::get('/posts', function () {
    return view('posts');
})->name('posts');

/* About Route */
Route::get('/about', function () {
    return view('about');
})->name('about');

/* Projects Route */
Route::get('/projects', function () {
    return view('projects');
})->name('projects');
