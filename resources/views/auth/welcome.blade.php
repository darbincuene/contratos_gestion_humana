<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleBienvenido.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
@extends('layouts.navarprincipal') 
@section('content')
<body>
    @csrf       
        <div class="botones-container">
            <button type="submit" class="btn btn-primary">
                <img src="{{ asset('imagenes/administrativo.png') }}" alt="Admin" class="btn-icon">
                Administrativo
            </button>
            <button type="submit" class="btn btn-primary">
                <img src="{{ asset('imagenes/profesor.png') }}" alt="Admin" class="btn-icon">
                Docente
            </button>
        </div>
</body>
@endsection
</html>