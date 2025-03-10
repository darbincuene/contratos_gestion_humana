<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\rol;

class AuthController extends Controller{
    public function login(Request $request){
    // Validar los datos del formulario
    $validate = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Buscar al usuario por su email
    $user = User::where('email', $request->email)->first();

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && Hash::check($request->password, $user->password)) {
        // Autenticar al usuario
        Auth::login($user);
        $request->session()->regenerate();
    
        // Redirigir al menú principal
        return redirect()->route('menu');
    } else {
        // Si las credenciales son incorrectas, retornar con errores
        return back()->withErrors([
            'email' => 'Credenciales incorrectas', // Mensaje genérico para no revelar información sensible
        ])->withInput($request->only('email'));
        }
    }
}