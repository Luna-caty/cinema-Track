<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [MovieController::class, 'index'])->name('home'); 
Route::get('/create', [MovieController::class, 'create'])->name('create'); 
Route::post('/store', [MovieController::class, 'store'])->name('store');
Route::delete ('/destroy/{id}',[MovieController::class,'destroy'])->name(('destroy'));
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [MovieController::class, 'update'])->name('update');


Route::get('/series', function () {
    return view('series');
})->name('series');

Route::get('/movies', function () {
    return view('movies');
})->name('movies');

Route::get('/animes', function () {
    return view('animes');
})->name('animes');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [MovieController::class, 'adminIndex'])->name('admin');
});
require __DIR__.'/auth.php';
