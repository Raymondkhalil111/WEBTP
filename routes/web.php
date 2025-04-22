<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Signup form display
Route::get('/signup', [UserController::class, 'showForm'])->name('signup.form');

// Signup form submission
Route::post('/signup', [UserController::class, 'register'])->name('signup.submit');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');