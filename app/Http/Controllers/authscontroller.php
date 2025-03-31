<?php

namespace App\Http\Controllers;

use App\Models\rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class authscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function vistaregistrar(){
        $roles=rol::all();

        return view('auth.register', compact('roles'));

    }
    public function index()
    {
       return view('dashboard.administrador');
    }
    public function login(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('ver.cargos');
              
            }else{
                return back()->withErrors(['password' => 'Contraseña incorrecta']);
            }
        }else{
            return back()->withErrors([
                'email' => 'El email no existe'
            ])->withInput();
        }
    }

    public function registrarusuario(Request $request){
        $validate = $request->validate([
            'email'=>'required|email|unique:users',
            'name'=>'required|string|max:255',
            'rol_id'=>'required',
            'fecha_caducidad'=>'nullable|date',
            'password'=>'required|string|min:5',
        ]);
        $user=User::firstOrCreate(
            ['email'=>$request->email],
            ['name'=>$request->name,
            'fecha_caducidad'=>$request->fecha_caducidad,
            'rol_id'=>$request->rol_id,
            'password'=>Hash::make($request->password)]
        );
        Auth::login($user);
         return redirect()->route('login.usuarios');

    
    }

    public function cerrarsesion(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.usuarios');

    }

    
}
