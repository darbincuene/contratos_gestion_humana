<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- {{-- <link rel="stylesheet" href="{{ asset('css/registroUsuarios.css') }}"> --}} -->
    <link rel="stylesheet" href="{{ asset('css/styleRegister.css') }}">

    {{-- @vite('resources/css/styleLogin.css')
    @vite('resources/js/auth.js') --}}
    <title>Añadir Usuarios</title>
</head>
@extends('layouts.prueba')
@section('content')

    <body class="formularys" style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}')">
        <div class="contenedors">
            <form action="{{ route('registrar.usuarios') }}" method="POST" class="">
                @csrf
                <div class="titulo">
                    <h2 class="text-center mb-4">Agregar Usuario</h2>
                </div>

                <label for="">Nombre</label>
                <input class="imput" type="text" name="name" placeholder="" required>

                <label for="">Correo</label>
                <input class="imput" type="email" name="email" placeholder="" required>

                <label for="fecha_caducidad">Fecha de Caducidad:</label>
                <input type="date" id="fecha_caducidad" name="fecha_caducidad" class="imput" >

                <select class="form-selecciona" id="rol_id" name="rol_id" required>
                    <option value="">Selecciona un rol</option>
                    @foreach ($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach

                </select>

                <label for="">Contraseña</label>
                <input type="password" name="password" class="imput" placeholder="" required>

                <button class="boton" type="submit">Registrar</button>

            </form>
        </div>
    </body>
@endsection

</html>
