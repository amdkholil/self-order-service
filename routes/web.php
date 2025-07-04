<?php

use Illuminate\Support\Facades\Route;

Route::get('/401', fn()=>abort(401))->name('login');

Route::get('/{any}', function () {
    return view('front.home');
})->where('any', '^(?!api|docs).*$');
