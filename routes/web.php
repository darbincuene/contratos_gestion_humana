<?php

use App\Http\Controllers\authscontroller;
use App\Http\Controllers\archivos\archivosController;
use App\Http\Middleware\authMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\carpeta;


Route::middleware(authMiddleware::class)->group(function() {
    Route::get('/cerrar/sesion',[authscontroller::class,'cerrarsesion'])->name('cerrar.sesion');
    
    Route::post('/crear/carpeta', [archivosController::class, 'crearCarpeta'])->name('crear.carpeta');
    Route::get('/carpetas', [archivosController::class, 'index'])->name('carpeta');
    route::get('/ver/carpetas', [archivosController::class, 'carpetas'])->name('todas.carpetas');

    Route::get('/subirarchivos/{subcarpeta_id}', [archivosController::class, 'vistasubirarchivos'])->name('formulario.archivos');
    Route::post('/subir/archivos', [archivosController::class, 'subirArchivos'])->name('subir.archivos');

    Route::get('/detalle/archivos/{subcarpeta_id}', [archivosController::class, 'detalleCarpetas'])->name('detalle.archivos');
    Route::get('/descargar/archivos/{id}', [archivosController::class, 'descargar'])->name('descargar.archivos');
    Route::get('/descargar/carpeta/{id}', [archivosController::class, 'descargarCarpeta'])->name('descargar.carpeta');

    Route::get('/ver/archivo/{id}', [archivosController::class, 'visualizarArchivo'])->name('ver.archivo');

    // Route::post('/eliminar/carpeta/{id}',[archivosController::class,'eliminarArchivo'])->name('eliminar.archivo');
    Route::delete('/eliminar/carpeta/{id}', [archivosController::class, 'eliminarCarpeta'])->name('eliminar.archivo');
    Route::delete('/eliminar/subcarpeta/{id}', [archivosController::class, 'eliminarSubcarpeta'])->name('eliminar.subcarpeta');
    Route::delete('/eliminar/archivo/{id}', [archivosController::class, 'eliminarArchivo'])->name('delete.archivo');



    Route::get('/compartir/carpeta/{id}', [archivosController::class, 'compartirCarpeta'])->name('compartir.carpeta');
    Route::get('/compartir/carpeta/ver/{token}', [archivosController::class, 'verCarpeta'])->name('ver.carpeta');

    Route::get('/alert', function () {
        return view('welcome');
    });
    Route::get('/registro/usuarios', [authscontroller::class, 'vistaregistrar'])->name('ver.usuarios');
    Route::post('/registro', [authscontroller::class, 'registrarusuario'])->name('registrar.usuarios');

    Route::get('/ver/cargos', [archivosController::class, 'cargos'])->name('ver.cargos');

    Route::get('/filtrar/carpetas/{id}', function ($id) {
        $archivosC = new archivosController();
        $cargo = $archivosC->filtroVerCarpeta($id);
        return view('tablas.carpeta', compact('cargo'));
    })->name('filtrar.archivos');

    
    
});

Route::get('/', function () {
    return view('auth.login');
})->name('login.usuarios');

Route::post('/login', [authscontroller::class, 'login'])->name('login.crear');



