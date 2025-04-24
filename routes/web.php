<?php

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GoalController;
use Illuminate\Container\Attributes\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login' , [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function (){
    return view('tampilan.home');
});

Route::get('/tampil', [BookController::class, 'showBook'])->name('book.index');
Route::get('/tampil/create', [BookController::class, 'create'])->name('book.create');
Route::post('/tampil', [BookController::class, 'store'])->name('book.store');
Route::get('/tampil/{id}/detail', [BookController::class, 'show'])->name('book.show');
Route::get('/tampil/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/tampil/{book}/', [BookController::class, 'update'])->name('book.update');
Route::delete('/tampil/{book}', [BookController::class, 'destroy'])->name('book.destroy');
Route::get('/allbook', [BookController::class, 'search' , 'showBook'])->name('tampilan.all');
Route::post('/goal/store', [GoalController::class, 'store'])->name('goal.store');
Route::patch('tampil/{book}/progress', [BookController::class, 'updateProgress'])->name('books.updateProgress');
// Route untuk menyelesaikan buku
Route::patch('/books/{book}/complete', [BookController::class, 'complete'])->name('book.complete');



