<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/login', function(){
    return view('auth.login');
})->name('login.usuarios');