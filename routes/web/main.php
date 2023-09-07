<?php

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
|                                   Guest
|--------------------------------------------------------------------------
*/

Route::middleware(['guest'])->group(function () {
    require 'guest/auth.php';
});

/*
|--------------------------------------------------------------------------
|                                   User
|--------------------------------------------------------------------------
*/

Route::name('admin.')->middleware(['auth'])->group(function () {
    require 'user/account.php';
    require 'user/posts.php';
});
