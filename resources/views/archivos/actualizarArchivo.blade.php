<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">
    <link rel="stylesheet" href="{{ asset('css/stylearchivoActualizar.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Archivo</title>
</head>
@extends('layouts.prueba')
@section('content')

    <body style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}')">

        <div class="contenedor-mayor-actualizar">
            {{-- <div class="divsubmayor"> --}}
                <form class="contenedor-actualizar" action="{{ route('actualizar.archivo') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1 class="textoactualizar">Actualizar </h1>
                    <input type="hidden" name="archivo_id" value="{{ $archivo->id }}">

                    <label class="archivolabel" for="file">{{ $archivo->nombre_archivo }}</label>
                    <input class="archivoInput" name="file" type="file" id="file">

                    {{-- <div class="div-botonactualizar">
                <button type="submit" class="btn-actualizar-archivo">Actualizar</button>

            </div> --}}
                    <div class="div-botonactualizar">
                        <button class="botoniniciarsesion" type="submit">
                            <span class="button-content">Iniciar Sesión</span>
                        </button>
                    </div>
                </form>
            {{-- </div> --}}

        </div>


    </body>
@endsection

</html>
