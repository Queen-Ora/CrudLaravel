<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('registration');
// });
// Route::post('/', [MainController::class, 'insertAdmin'])->name('insert');

// 
Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/', [MainController::class, 'handle_login'])->name('login');
// 

Route::get('/admin', [MainController::class, 'home'])->name('welcome');
Route::post('/admin', [MainController::class, 'addUser'])->name('addUser');
Route::get('/edit/{id}', [MainController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [MainController::class, 'update'])->name('user_update');
Route::post('/delete/{id}', [MainController::class, 'destroy'])->name('destroy');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');