<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="{{ asset('css/styleMenu.css') }}">
</head>
@extends('layouts.navarprincipal') 
@section('content')
<body>
    <div class="contenedor-menu">
        <h1 class="menu_titulo">MENU</h1>
        <div class="menu-opciones">
            <!-- Botón para Historial laboral -->
            <button class="botones-menu">
                <img src="{{ asset('imagenes/historial.png') }}" alt="Historias" class="menu-icon">
                <span class="menu-text">Historial Laboral</span>
            </button>

            <!-- Botón para Consultar individual -->
            <button class="botones-menu">
                <img src="{{ asset('imagenes/crear.png') }}" alt="Consultar individual" class="menu-icon">
                <span class="menu-text">Crear individual</span>
            </button>

            <!-- Botón para Consultar -->
            <button class="botones-menu">
                <img src="{{ asset('imagenes/consultar.png') }}" alt="Consultar" class="menu-icon">
                <span class="menu-text">Consultar</span>
            </button>

            <!-- Botón para Descargar -->
            <button class="botones-menu">
                <img src="{{ asset('imagenes/descargar.png') }}" alt="Descargar" class="menu-icon">
                <span class="menu-text">Descargar</span>
            </button>

            <!-- Botón para Compartir -->
            <button class="botones-menu">
                <img src="{{ asset('imagenes/compartido.png') }}" alt="Compartir" class="menu-icon">
                <span class="menu-text">Compartir</span>
            </button>
        </div>
    </div>
</body>
@endsection
</html>