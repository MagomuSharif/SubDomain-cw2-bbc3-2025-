<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/Edit', function () {
    return view('Edit');
});


Route::POST('/store',[CustomersController::class,'store']);

Route::get('/Admin',[CustomersController::class,'show'])->middleware('auth');

Route::DELETE('/destroy/{id}',[CustomersController::class,'destroy'])->name('destroy');

Route::get('/Edit{id}',[CustomersController::class,'edit'])->name('Edit');

Route::PATCH('/update/{id}',[CustomersController::class,'update'])->name('update');


Route::get('/register',[AuthController::class,'showRegister'])->name('show.register');
Route::get('/login',[AuthController::class,'showLogin'])->name('show.login');

Route::POST('/register',[AuthController::class,'register'])->name('register');
Route::POST('/login',[AuthController::class,'login'])->name('login');

Route::POST('/logout',[AuthController::class,'logout'])->name('logout');


