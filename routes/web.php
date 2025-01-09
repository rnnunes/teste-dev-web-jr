<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/users', [UsersController::class,'index'])->name('users.index');
Route::get('/users/cadastro', [UsersController::class,'create'])->name('users.create');
Route::post('/users', [UsersController::class,'store'])->name('users.store');
Route::post('/users/{user}', [UsersController::class,'show'])->name('users.show');
Route::post('/users/{user}/edit', [UsersController::class,'show'])->name('users.edit');
Route::put('/users/{user}', [UsersController::class,'update'])->name('users.update');
Route::delete('/users/{user}', [UsersController::class,'destroy'])->name('users.destroy');
