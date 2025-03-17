<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir archivos</title>
    <link rel="stylesheet" href="{{ asset('css/subirarchivos.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lobster&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">


    
    {{-- @vite('resources/css/stylesubirarchivos.css') --}}
    {{-- @vite('resources/js/subirarchivo.js') --}}

@extends('layouts.prueba')
@section('content')
</head>
<body>

    <div class="contenedor-principal">
        <form id="uploadForm" action="{{ route('subir.archivos') }}" method="POST" enctype="multipart/form-data"class="contenedor-formulario">
            @csrf
            <input type="hidden" name="subcarpeta_id" value="{{ $subcarpetas->id }}">
            {{-- <input type="hidden" name="usuario_id" value="{{ auth()->id() }}"> <!-- Para identificar al usuario --> --}}
    
            @foreach ($tiposdoc as $tipo)
                <label class="titulo-input" for="files_{{ $tipo->id }}">{{ $tipo->nombre }}</label>
                <input type="file" name="files[{{ $tipo->id }}]" id="archivo_{{ $tipo->id }}" required>
            @endforeach
    
            <button type="submit">Subir Archivos</button>
        </form>
    </div>

</body>
@endsection
</html 
