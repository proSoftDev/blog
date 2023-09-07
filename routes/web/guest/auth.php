<?php

use Illuminate\Support\Facades\Auth;

Auth::routes([
    'verify' => false,
    'reset' => false,
    'confirm' => false,
]);
