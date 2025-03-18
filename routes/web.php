<?php
use App\Http\Controllers\authscontroller;
use App\Http\Controllers\archivos\archivosController;
use Illuminate\Support\Facades\Route;




Route::get('/registro/usuarios',[authscontroller::class, 'vistaregistrar'])->name('ver.usuarios');
Route::post('/registro',[authscontroller::class, 'registrarusuario'])->name('registrar.usuarios');
Route::post('/login',[authscontroller::class, 'login'])->name('login.crear');

Route::get('/dashboard', [authscontroller::class,'index'])->name('dashboard.prueba');

Route::post('/crear/carpeta',[archivosController::class,'crearCarpeta'])->name('crear.carpeta');
Route::get('/carpetas',[archivosController::class,'index'])->name('carpeta');
 route::get('/ver/carpetas',[archivosController::class, 'carpetas'])->name('todas.carpetas');

Route::get('/subirarchivos/{subcarpeta_id}',[archivosController::class,'vistasubirarchivos'])->name('formulario.archivos');
Route::post('/subir/archivos',[archivosController::class,'subirArchivos'])->name('subir.archivos');

Route::get('/detalle/archivos/{subcarpeta_id}',[archivosController::class,'detalleCarpetas'])->name('detalle.archivos');
Route::get('/descargar/archivos/{id}',[archivosController::class,'descargar'])->name('descargar.archivos');




Route::get('/', function () {
    return view('auth.login');
})->name('login.usuarios');
route::get('/inicio', function(){
    return view("dashboard.dashboard");
})->name('inicio');




route::get('/menu', function(){
    return view('dashboard.menu');
});

route::get('/subMenu', function(){
    return view('dashboard.subMenu');
});




route::get('/editar', function(){
    return view("dashboard.editar");
})->name('actualizar.archivos');



