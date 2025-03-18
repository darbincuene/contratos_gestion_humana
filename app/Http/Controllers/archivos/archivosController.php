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
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class archivosController extends Controller
{


    public function carpetas(){
        // $carpeta=carpeta::all();
        $cargo=carpeta::with(['cargo.carpetas'])->get();
        return view('archivos.carpetas', compact('cargo'));
    }
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
        // $tipo_documento_id = $request->input('tipo_documento');
        $subcarpeta_id = $request->input('subcarpeta_id');
    

        $request->validate([
            'files.*' => 'required|file|mimes:jpg,png,pdf,docx|max:5120', // 5MB máximo
            // 'tipo_documento_id'=>'required',
            'subcarpeta_id'=>'required',
            'files' => 'required|array',
            // 'archivos.*' => 'file|mimes:jpg,png,pdf,docx|max:5120',

        ]);
        // dd($request);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $tipo_documento_id => $file) {
                $nombreArchivo = time() . '_' . $file->getClientOriginalName();
                $tipoMime = $file->getClientMimeType();
                $rutaArchivo=$file->storeAs('archivos',$nombreArchivo,'public');
                
                // dd($tipoMime);
                $archivo = archivo::create([
                    'nombre_archivo' => $nombreArchivo,
                    'tipo_archivo' => $tipoMime,
                    'ruta_archivo' => $rutaArchivo, 
                    'subcarpeta_id' => $request->subcarpeta_id, 
                    'tipo_documento_id' => $tipo_documento_id, 
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

    public function detalleCarpetas($id){

        $archivos = Archivo::with(['subcarpeta.archivos'])
        ->where('subcarpeta_id', $id) 
        ->get();
        return view('archivos.detalle', compact('archivos'));

        
    }

    public function descargar($id){
        $archivos=archivo::findOrFail($id);
        $rutaArchivo=$archivos->ruta_archivo;


        // dd($archivos);

        if (!Storage::exists($archivos->ruta_archivo)) {
            return response()->json(['message'=> 'El archivo no existe en el servidor.'],404);
        }
        
        return Storage::download($rutaArchivo, $archivos->nombre_archivo);
        
    }
}
