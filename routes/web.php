<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReaderController;
use App\Models\Category;
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

// login_____________________________________________________________________
Route::get('/login', [AdminController::class, 'index']);
Route::post('/register', [AdminController::class, 'store']);
Route::post('/login', [AdminController::class, 'login']);

//___________________________________________________________________________

// book _____________________________________________________________________
Route::resource('/books', BookController::class);
Route::get('books/{id}', [BookController::class, 'edit']);
Route::put('books/', [BookController::class, 'update']);
//___________________________________________________________________________

// genre_____________________________________________________________________
Route::resource('/genre', GenreController::class);
Route::get('fetch_genres', [GenreController::class, 'fetch_genres']);
Route::post('genre', [GenreController::class, 'store']);
Route::get('edit-genre/{id}', [GenreController::class, 'edit']);
Route::put('update-genre/{id}', [GenreController::class, 'update']);
Route::delete('delete-genre/{id}', [GenreController::class, 'destroy']);
//____________________________________________________________________________

// reader_____________________________________________________________________
Route::resource('/addReader', ReaderController::class);
Route::get('addReader/{id}', [ReaderController::class, 'edit']);
//____________________________________________________________________________

// category___________________________________________________________________
Route::resource('category', CategoryController::class);
Route::post('category', [CategoryController::class, 'store']);
Route::get('fetch_cate', [CategoryController::class, 'fetch_cate']);
Route::get('edit-cate/{id}', [CategoryController::class, 'edit']);
Route::put('update-cate/{id}', [CategoryController::class, 'update']);
Route::delete('delete-cate/{id}', [CategoryController::class, 'destroy']);
//____________________________________________________________________________