<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
@extends('layouts.navarprincipal') 
@section('content')
<body>
    @csrf       
        <div class="botones-container">
            <!-- Botón de Administrativo -->
            <button type="submit" class="btn btn-primary administrativo-btn">
                <img src="{{ asset('imagenes/administrativo.png') }}" alt="Admin" class="btn-icon administrativo-icon">
                <span class="btn-text">Administrativo</span>
            </button>

            <!-- Botón de Docente -->
            <button type="submit" class="btn btn-primary docente-btn">
                <img src="{{ asset('imagenes/profesor.png') }}" alt="Docente" class="btn-icon docente-icon">
                <span class="btn-text">Docente</span>
            </button>
        </div>
</body>
@endsection
</html>