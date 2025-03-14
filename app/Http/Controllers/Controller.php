<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard'; // Redirige al dashboard después del login

    // ...
}