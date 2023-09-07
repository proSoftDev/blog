<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return redirect()->route('admin.posts.index');
});

Route::resource('posts', PostController::class)->except('show');
