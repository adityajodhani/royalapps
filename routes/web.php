<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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



/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login/attempt', [AuthController::class,'attempt'])->name('login.attempt');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

// Middleware for Authenticate User is valid or not
Route::middleware(['auth.user'])->group(function () {

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');  

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

    Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');   

/*
|--------------------------------------------------------------------------
| Author
|--------------------------------------------------------------------------
*/

    Route::get('/authors', [AuthorController::class,'index'])->name('author.index');   
    Route::get('/authors/{id}', [AuthorController::class,'view'])->name('author.view');  
    Route::delete('/authors/{id}', [AuthorController::class,'delete'])->name('author.delete');  
    
/*
|--------------------------------------------------------------------------
| Books
|--------------------------------------------------------------------------
*/
    
    Route::get('/books/create', [BookController::class,'create'])->name('books.create');  
    Route::post('/books/store', [BookController::class,'store'])->name('books.store');  
    Route::delete('/books/{id}', [BookController::class,'delete'])->name('book.delete');   

});