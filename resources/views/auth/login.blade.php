<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{ asset('css/styleLogin.css') }}">

    

</head>
@extends('layouts.navarprincipal')
@section('content')
<body class="formulario">
    <div class="container">
        <!-- Contenedor de formularios -->
        <div class="form_wrapper">
            <!-- Formulario de inicio de sesión -->
            <form action="{{ route('login.crear') }}" method="POST" class="form_front">
                @csrf
                
                <h1 class="form_details"> Iniciar Sesión</h1>
                <input type="email" name="email" class="input" placeholder="Correo Electrónico" required>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password" class="input" placeholder="Contraseña" required>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="btn" type="submit">Iniciar Sesión</button>
                
            </form>
        </div>
    </div>
</body>
@endsection
</html>