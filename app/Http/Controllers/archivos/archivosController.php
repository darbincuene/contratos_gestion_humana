<?php

namespace App\Http\Controllers\archivos;

use App\Http\Controllers\Controller;
use App\Models\archivo;
use App\Models\cargararchivo;
use App\Models\cargo;
use App\Models\carpeta;
use App\Models\User;
use App\Models\ShareFolder;
use App\Models\subcarpeta;
use App\Models\tipodocumento;
use App\Models\historialarchivo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\Auth;

class archivosController extends Controller
{
    public function carpetas()
    {
        // $carpeta=carpeta::all();
        $cargo = carpeta::with(['cargo.carpetas'])->get();
        // dd($cargo);
        return view('archivos.carpetas', compact('cargo'));
    }
    public function index()
    {
        $cargo = cargo::all();
        return view('archivos.crearCarpeta', compact('cargo'));
    }

    // public function vistasubirarchivos($id)
    // {
    //     $tiposdoc = tipodocumento::all();
    //     $subcarpetas = subcarpeta::findOrFail($id);

    //     return view('archivos.subirArchivos', compact('tiposdoc', 'subcarpetas'));
    // }

    public function vistasubirarchivos($id)
    {
        $subcarpetas = Subcarpeta::findOrFail($id);

        $carpeta = $subcarpetas->carpeta;

        if ($carpeta && $carpeta->cargo_id == 1) {
            $excluir = [26, 27];
            $tiposdoc = Tipodocumento::whereNotIn('id', $excluir)->get();
        } else {
            $tiposdoc = Tipodocumento::all();
        }

        return view('archivos.subirArchivos', compact('tiposdoc', 'subcarpetas'));
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


        return redirect()->route('formulario.archivos', ['subcarpeta_id' => $subcarpeta->id]);
    }

    public function subirArchivos(Request $request)
    {
        $user = Auth::user();
        $accion = "Crear";
        // dd($accion);

        // dd($request->toArray());
        // $tipo_documento_id = $request->input('tipo_documento');
        $subcarpeta_id = $request->input('subcarpeta_id');


        $request->validate([
            'files.*' => 'required|file|mimes:jpg,png,pdf,docx|max:5120', // 5MB máximo
            // 'tipo_documento_id'=>'required',
            'subcarpeta_id' => 'required',
            'files' => 'required|array',
            // 'archivos.*' => 'file|mimes:jpg,png,pdf,docx|max:5120',

        ]);
        // dd($request);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $tipo_documento_id => $file) {
                $nombreArchivo = time() . '_' . $file->getClientOriginalName();
                $tipoMime = $file->getClientMimeType();
                $rutaArchivo = $file->storeAs('archivos', $nombreArchivo, 'public');

                // dd($tipoMime);
                $archivo = archivo::create([
                    'nombre_archivo' => $nombreArchivo,
                    'tipo_archivo' => $tipoMime,
                    'ruta_archivo' => $rutaArchivo,
                    'subcarpeta_id' => $request->subcarpeta_id,
                    'tipo_documento_id' => $tipo_documento_id,
                ]);
                // dd($archivo);
                $cargar_archv = cargararchivo::create([
                    'usuario_id' => $user->id,
                    'archivo_id' => $archivo->id,
                    'fecha_subida' => Carbon::now(),
                ]);

                // dd($historial_historialarchivo);
            }
            $historial_historialarchivo = historialarchivo::create([
                'accion' => $accion,
                'archivo_id' => $archivo->id,
                'usuario_id' => $user->id,
                'carpeta_id' => $request->subcarpeta_id,
            ]);
        }

        // return response()->json(['success' => true, 'message' => 'Archivos subidos correctamente.', 'archivos' => $archivo]);
        return view('welcome');
    }
    public function vistaactualizar($id)
    {
        $archivo = archivo::find($id);
        // dd($archivo->toArray());

        return view('archivos.actualizarArchivo',compact('archivo'));
    }


    public function editararchivo(Request $request )
    {
        $user = Auth::user();
        $accion = "Archivo actualizado";
       
        $archivo_id = $request->input('archivo_id');
        
        // dd($request);

        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,docx|max:5120', 
        ]);
        // dd($request);
        $archivo= archivo::find($archivo_id);
        $file = $request->file('file');
        $nombreArchivo = time() . '_' . $file->getClientOriginalName();
        $tipoMime = $file->getClientMimeType();
        $rutaArchivo = $file->storeAs('archivos', $nombreArchivo, 'public');

        $archivo->update([
            'nombre_archivo' => $nombreArchivo,
            'tipo_archivo' => $tipoMime,
            'ruta_archivo' => $rutaArchivo,
        ]);
        // dd($archivo);


        return response()->json(['success' => true, 'message' => 'Archivo actualizado correctamente.']);
    }




    public function detalleCarpetas($id)
    {

        $archivos = archivo::with('subcarpeta.carpeta')
            ->where('subcarpeta_id', $id)
            ->get();

        $datos = archivo::with('subcarpeta.carpeta')
            ->where('subcarpeta_id', $id)
            ->first();


        // dd($archivos);
        return view('archivos.detalle', compact('archivos', 'datos'));
    }


    public function descargar($id)
    {
        $archivos = archivo::findOrFail($id);
        //storage_path es una funcion que nos  devuelve la ruta absoluta o excata de la carpeta storage
        $rutaArchivo = storage_path('app/public/' . $archivos->ruta_archivo);

        if (!file_exists($rutaArchivo)) {
            return response()->json(['message' => 'El archivo no existe en el servidor.'], 404);
        }
        return response()->download($rutaArchivo, $archivos->nombre_archivo);
    }



    public function descargarCarpeta($id)
    {
        $subcarpeta = Subcarpeta::find($id);
        if (!$subcarpeta) {
            return response()->json(['error' => 'Subcarpeta no encontrada'], 404);
        }

        $zipFileName = $subcarpeta->nombre . '.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        $archivos = Archivo::where('subcarpeta_id', $id)->get();
        if ($archivos->isEmpty()) {
            return response()->json(['error' => 'No hay archivos para descargar'], 404);
        }
        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($archivos as $archivo) {
                $rutaArchivo = storage_path('app/public/' . $archivo->ruta_archivo);

                if (file_exists($rutaArchivo)) {
                    $zip->addFile($rutaArchivo, $archivo->id . '_' . basename($rutaArchivo));
                } else {
                }
            }
            $zip->close();
        } else {
            return response()->json(['error' => 'No se pudo crear el archivo ZIP'], 500);
        }

        return response()->download($zipPath, $zipFileName);
    }



    public function eliminarCarpeta($id)
    {

        $carpeta = carpeta::findOrFail($id);
        // $datos=
        $carpeta->delete();
        if (!$carpeta) {

            return redirect()->route('carpeta')->with('success', 'carpeta eliminado correctamente');
        }
        return view('welcome');
    }


    public function eliminarSubcarpeta($id)
    {

        $carpeta = subcarpeta::findOrFail($id);
        // $datos=
        $carpeta->delete();
        if (!$carpeta) {

            return redirect()->route('carpeta')->with('success', 'carpeta eliminado correctamente');
        }
        return view('welcome');
    }
    public function visualizarArchivo($id)
    {
        $archivo = archivo::findOrFail($id);
        $rutaArchivo = $archivo->ruta_archivo;
        // dd($rutaArchivo);

        if (!Storage::disk('public')->exists($rutaArchivo)) {
            return response()->json(['message' => 'Archivo no encontrado'], 404);
        }

        return response()->json(['url' => asset("storage/" . $rutaArchivo)]);
    }


    public function compartirCarpeta($id)
    {
        $carpeta = carpeta::with('subcarpeta.archivos')->findOrFail($id); //carg la carpeta con sus relaciones

        //es para verificar si hay un enlace activo
        $existingSharedFolder = ShareFolder::where('carpeta_id', $id)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        // si se encuentra actico devuelve el enlace que tiene sin crear un nuevo enlace
        if ($existingSharedFolder) {
            return response()->json([
                'success' => true,
                'message' => 'Ya existe un enlace activo',
                'url' => route('ver.carpeta', ['token' => $existingSharedFolder->token]),
                'expires_at' => $existingSharedFolder->expires_at,
            ]);
        }

        // Generar un token único
        $token = Str::random(40); //genera un token unico
        $expiration = Carbon::now()->addHours(24);

        // almacena ellink de la carpeta en la base de datos

        $sharedFolder = ShareFolder::create([
            'carpeta_id' => $carpeta->id,
            'token' => $token,
            'expires_at' => $expiration,
        ]);

        $url = route('ver.carpeta', ['token' => $token]);

        return response()->json([
            'success' => true,
            'message' => 'Enlace generado con éxito',
            'url' => $url,
            'expires_at' => $expiration,
        ]);
    }

    //  ver el contenido de la carpeta comparatida
    public function verCarpeta($token)
    {
        $sharedFolder = ShareFolder::where('token', $token)->first(); //esto hace es que busquemos en la base de datos el token recibido

        if (!$sharedFolder || $sharedFolder->isExpired()) {
            return response()->json(['message' => 'El enlace ha expirado o no existe'], 404);
        }

        $carpeta = $sharedFolder->carpeta;
        $subcarpetas = subcarpeta::where('carpeta_id', $carpeta->id)->with('archivos')->get();

        return view('archivos.verCarpeta', compact('carpeta', 'subcarpetas'));
    }

    public function filtroVerCarpeta($id)
    {
        return carpeta::whereHas('cargo', function ($query) use ($id) {
            $query->where('id', $id);
        })->with('cargo')->get();
    }

    public function cargos()
    {
        $cargos = cargo::all();
        return view('dashboard.dashboard', compact('cargos'));
    }

    public function eliminarArchivo($id)
    {

        $archivo = archivo::findOrFail($id);
        // $datos=
        $archivo->delete();
        if (!$archivo) {

            return redirect()->route('delete.archivos')->with('success', 'archivo eliminado correctamente');
        }
        return view('welcome');
    }

    public function auditar($id)
    {

        $auditoria = historialarchivo::with(['carpeta.cargo', 'usuario'])->findOrFail($id);
        // dd($auditoria->toArray());
        return view('archivos.auditoria', compact('auditoria'));
    }
}
