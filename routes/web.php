<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id:int}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id:int}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id:int}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id:int}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/users/{id:int}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('/users/{id:int}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('/users/{id:int}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/users/{userId:int}/comments/{id:int}', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id:int}', [CommentController::class, 'update'])->name('comments.update');



