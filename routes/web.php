<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReaderController;
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
Route::post('/login', [AdminController::class, 'store'])->name('admin_register');

Route::resource('/books', BookController::class);
Route::get('books/{id}', [BookController::class, 'edit']);
Route::put('books/', [BookController::class, 'update']);

Route::resource('/genre', GenreController::class);
Route::get('fetch_genres', [GenreController::class, 'fetch_genres']);
Route::post('genre', [GenreController::class, 'store']);
Route::get('edit-genre/{id}', [GenreController::class, 'edit']);
Route::put('update-genre/{id}', [GenreController::class, 'update']);

Route::resource('/addReader', ReaderController::class);

Route::resource('category', CategoryController::class);