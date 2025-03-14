<?php

namespace App\Http\Controllers\archivos;

use App\Http\Controllers\Controller;
use App\Models\archivo;
use App\Models\cargararchivo;
use App\Models\cargo;
use App\Models\carpeta;
use App\Models\subcarpeta;
use App\Models\tipodocumento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class archivosController extends Controller
{

    public function index()
    {
        $cargo = cargo::all();
        return view('archivos.crearCarpeta', compact('cargo'));
    }

    public function vistasubirarchivos($id){
        $tiposdoc= tipodocumento::all();
        $subcarpetas= subcarpeta::findOrFail($id);

        return view('archivos.subirArchivos', compact('tiposdoc','subcarpetas'));
    }
    public function crearCarpeta(Request $request)
    {
        // dd($request->toArray());

        $nombre_carpeta = $request->input('nombre_carpeta');
        $cargo_id = $request->input('cargo');


        $request->validate([
            'nombre_carpeta' => 'required',
            'cargo_id' => 'required',

        ]);

        $carpeta = carpeta::create([
            'nombre' => $request->nombre_carpeta,
            'cargo_id' => $request->cargo_id,
        ]);

        $subcarpeta = subcarpeta::create([
            'nombre' => 'historial laboral',
            'carpeta_id' => $carpeta->id,
        ]);


        return redirect()->route('formulario.archivos',['subcarpeta_id'=>$subcarpeta->id]);
    }

    public function subirArchivos(Request $request){

        // dd($request->toArray());
        $tipo_documento_id = $request->input('tipo_documento');
        $subcarpeta_id = $request->input('subcarpeta_id');
    

        $request->validate([
            'files.*' => 'required|file|mimes:jpg,png,pdf,docx|max:5120', // 5MB máximo
            'tipo_documento_id'=>'required',
            'subcarpeta_id'=>'required'
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $nombreArchivo = time() . '_' . $file->getClientOriginalName();
                $tipoMime = $file->getClientMimeType();
                $rutaArchivo=$file->storeAs('archivos',$nombreArchivo,'public');
                
                // dd($tipoMime);
                $archivo = archivo::create([
                    'nombre_archivo' => $nombreArchivo,
                    'tipo_archivo' => $tipoMime,
                    'ruta_archivo' => $rutaArchivo, 
                    'subcarpeta_id' => $request->subcarpeta_id, 
                    'tipo_documento_id' => $request->tipo_documento_id, 
                ]);
                // dd($archivo);
                cargararchivo::create([
                    'usuario_id' => 1, 
                    'archivo_id' => $archivo->id,
                    'fecha_subida' => Carbon::now(),
                ]);

            }
        }

        return response()->json(['success'=>true,'message'=> 'Archivos subidos correctamente.','archivos'=>$archivo]);
    }
}
