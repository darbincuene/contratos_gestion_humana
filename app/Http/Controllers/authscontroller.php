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
                return redirect()->route('carpeta');
              
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
