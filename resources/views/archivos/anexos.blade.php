<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir archivos</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">

    <link rel="stylesheet" href="{{ asset('css/subirarchivos.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lobster&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


 
    
    {{-- @vite('resources/css/stylesubirarchivos.css') --}}
    {{-- @vite('resources/js/subirarchivo.js') --}}

@extends('layouts.prueba')
@section('content')
</head>
<body>

    <div class="contenedor-principal">
        <form id="uploadForm" action="{{route('guaradar.docsfaltantes')}}" method="POST"
            enctype="multipart/form-data" class="contenedor-formulario">
            @csrf
            {{-- <input type="hidden" name="subcarpeta_id" value="{{ $subcarpetas->id }}"> --}}
            <h1>documentos faltantes</h1>
    
            <div id="inputs-container">
                @foreach ($docsfaltantes as $index => $tipo)
                    <div class="labels input-group page-{{ intdiv($index, 5) }}" style="display: {{ $index < 5 ? 'block' : 'none' }};">
                        <label class="titulo-input" for="files_{{ $tipo->id }}">{{ $tipo->nombre }}</label>
                        <input type="hidden" name="documentos_ids[]" value="{{ $tipo->id }}">

                        <input type="file" name="files[{{ $tipo->id }}]" id="archivo_{{ $tipo->id }}">
                    </div>
                @endforeach
            </div>
    
            <div class="pagination-buttons">
                <button type="button" id="prevBtn" class="btn" onclick="changePage(-1)" style="display: none;"><i class="fa-solid fa-backward"></i></button>
                <button type="button" id="nextBtn" class="btn" onclick="changePage(1)"><i class="fa-solid fa-forward"></i></button>
            </div>
    
            <button type="submit" class="submit-btn">Subir Archivos</button>
        </form>
    </div>

</body>
@endsection
<script>
  let currentPage = 0;
  const totalPages = {{ intdiv(count($docsfaltantes) + 4, 5) }}; 
  function changePage(step) {
    document.querySelectorAll(`.page-${currentPage}`).forEach(el => el.style.display = "none");
    currentPage += step;
    document.querySelectorAll(`.page-${currentPage}`).forEach(el => el.style.display = "block");

    document.getElementById("prevBtn").style.display = currentPage > 0 ? "inline-block" : "none";
    document.getElementById("nextBtn").style.display = currentPage < totalPages - 1 ? "inline-block" : "none";
}

</script>
</html 

