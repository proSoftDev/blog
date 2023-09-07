<?php

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Support\Facades\Route;

Route::name('account.')->prefix('account')->group(function () {
    Route::post('logout', [AccountController::class, 'logout'])->name('logout');
});
