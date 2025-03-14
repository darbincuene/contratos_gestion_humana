<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Carpeta</title>
    <link rel="stylesheet" href="{{ asset('css/styleCrearCarpeta.css') }}">
</head>
@extends('layouts.navarprincipal')
@section('content')

    <body>
        <div class="crearCarpeta">
            <h1>Crear Nueva Carpeta</h1>

            <!-- Formulario para crear una carpeta -->
            <form action="{{ route('crear.carpeta') }}" method="POST">
                @csrf
                <div class="">
                    <input required="required" type="text" name="nombre_carpeta">
                    <span>Nombre de la carpeta</span>
                </div>
                <div class="">
                    <select name="cargo_id" id="">
                        <option value="">nombre cargo</option>
                        @foreach ($cargo as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div>
                    <div class="">
                        <input required="required" type="text" name="nombre_subcarpeta">

                        <span>Nombre subcarpeta</span>
                    </div>
                </div> --}}


                <button class="btn-crear" type="submit">Crear</button>
            </form>
            <!-- Enlace para volver a la vista principal -->
            <a href="carpetas.php" class="boton-volver">Volver</a>
        </div>

        
    </body>
@endsection

</html>
