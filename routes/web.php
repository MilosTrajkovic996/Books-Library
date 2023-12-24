<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

// All Books
Route::get('/', [BookController::class, 'index']);

// Show Create Form
Route::get('/books/create', [BookController::class, 'create'])->middleware('auth');

// Store Book Data
Route::post('/books', [BookController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->middleware('auth');

// Update Book
Route::put('/books/{book}', [BookController::class, 'update'])->middleware('auth');

// Single Book
Route::get('/books/{book}', [BookController::class, 'show']);

// Delete Book
Route::delete('/books/{book}', [BookController::class, 'delete'])->middleware('auth');

// Manage Books
Route::get('/books-manage', [BookController::class, 'manage'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'register']);

// Create New User
Route::post('/users', [UserController::class, 'registerUser']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



