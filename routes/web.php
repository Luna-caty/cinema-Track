<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


Route::get('/', [MovieController::class, 'index'])->name('movies'); 
Route::get('/create', [MovieController::class, 'create'])->name('create'); 
Route::post('/store', [MovieController::class, 'store'])->name('store');
Route::delete ('/destroy/{id}',[MovieController::class,'destroy'])->name(('destroy'));
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [MovieController::class, 'update'])->name('update');





// Route::get('/', function () {
//     return view('home');
// });
