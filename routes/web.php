<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login.usuarios');

route::get('/dashboard', function(){
    return view('dashboard.dashboard');
});

route::get('/menu', function(){
    return view('dashboard.menu');
});

route::get('/register', function(){
    return view('auth.register');
})->name('registrar.usuarios');

route::get('/email', function(){
    return view('auth.email');
})->name('password.email');

route::get('/resetPassword', function(){
    return view('auth.resetPassword');
})->name('password.update');

route::get('/dashboard', function(){
    return view("dashboard.administrador");
});

route::get('/editar', function(){
    return view("dashboard.editar");
})->name('actualizar.archivos');