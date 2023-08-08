<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });
Route::resource('/login', AdminController::class);
Route::post('login', [AdminController::class, 'store'])->name('admin_register');
Route::get('books/{id}', [BookController::class, 'edit']);
Route::put('books/', [BookController::class, 'update']);
Route::resource('/books', BookController::class);
Route::resource('/genre', GenreController::class);