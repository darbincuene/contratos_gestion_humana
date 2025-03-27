<?php
use App\Http\Controllers\authscontroller;
use App\Http\Controllers\archivos\archivosController;
use Illuminate\Support\Facades\Route;
use App\Models\carpeta;



 
Route::get('/registro/usuarios',[authscontroller::class, 'vistaregistrar'])->name('ver.usuarios');
Route::post('/registro',[authscontroller::class, 'registrarusuario'])->name('registrar.usuarios');
Route::post('/login',[authscontroller::class, 'login'])->name('login.crear');


Route::post('/crear/carpeta',[archivosController::class,'crearCarpeta'])->name('crear.carpeta');
Route::get('/carpetas',[archivosController::class,'index'])->name('carpeta');
route::get('/ver/carpetas',[archivosController::class, 'carpetas'])->name('todas.carpetas');

Route::get('/subirarchivos/{subcarpeta_id}',[archivosController::class,'vistasubirarchivos'])->name('formulario.archivos');
Route::post('/subir/archivos',[archivosController::class,'subirArchivos'])->name('subir.archivos');

Route::get('/detalle/archivos/{subcarpeta_id}',[archivosController::class,'detalleCarpetas'])->name('detalle.archivos');
Route::get('/descargar/archivos/{id}',[archivosController::class,'descargar'])->name('descargar.archivos');
Route::get('/descargar/carpeta/{id}',[archivosController::class,'descargarCarpeta'])->name('descargar.carpeta');

Route::get('/ver/archivo/{id}',[archivosController::class,'visualizarArchivo'])->name('ver.archivo');

// Route::post('/eliminar/carpeta/{id}',[archivosController::class,'eliminarArchivo'])->name('eliminar.archivo');
Route::delete('/eliminar/carpeta/{id}', [archivosController::class, 'eliminarArchivo'])->name('eliminar.archivo');
Route::delete('/eliminar/subcarpeta/{id}', [archivosController::class, 'eliminarSubcarpeta'])->name('eliminar.subcarpeta');


Route::get('/compartir/carpeta/{id}', [archivosController::class, 'compartirCarpeta'])->name('compartir.carpeta');   
Route::get('/compartir/carpeta/ver/{token}', [archivosController::class, 'verCarpeta'])->name('ver.carpeta');


Route::get('/', function () {
    return view('auth.login');
})->name('login.usuarios');


route::get('/menu', function(){
    return view('dashboard.menu');
});

route::get('/subMenu', function(){
    return view('dashboard.subMenu');
});




route::get('/editar', function(){
    return view("dashboard.editar");
})->name('actualizar.archivos');

Route::get('/alert',function(){
    return view('welcome');
});


Route::get('/ver/cargos', [archivosController::class, 'cargos'])->name('ver.cargos');

Route::get('/filtrar/carpetas/{id}', function ($id) {
    $archivosC = new archivosController();
    $cargo = $archivosC->filtroVerCarpeta($id); 
    return view('tablas.carpeta', compact('cargo'));
    })->name('filtrar.archivos');