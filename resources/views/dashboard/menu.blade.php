<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="{{ asset('css/styleMenu.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
@extends('layouts.navarprincipal') 
@section('content')
<body>
    <div class="contenedor-menu">
        <h1 class="menu_titulo">MENU</h1>
        <div class="menu-opciones">
            <!-- Botón para Historial laboral -->
            <button class="botones-historial">
                <span class="menu-text">Historial Laboral</span> <!-- Texto del botón -->
                <i class="fas fa-file-alt document"></i> <!-- Icono principal (documento) -->
                <i class="fas fa-clock clock-icon"></i> <!-- Icono de animación (reloj) -->
            </button>

            <!-- Botón para Consultar -->
            <button class="botones-menu">
                <span class="menu-text">Consultar</span> <!-- Texto del botón -->
                <i class="fas fa-file-alt document"></i> <!-- Icono principal -->
                <i class="fas fa-search search-icon"></i> <!-- Icono de animación -->
            </button>

            <!-- Botón para Descargar -->
            <button class="boton-descargar">
                <span class="menu-text">Descargar</span> <!-- Texto del botón -->
                <i class="fas fa-cloud cloud-icon"></i> <!-- Icono principal (nube) -->
                <i class="fas fa-arrow-down arrow-icon"></i> <!-- Icono de animación (flecha) -->
            </button>

            <!-- Botón para Compartir -->
            <button class="boton-share">
                <span class="menu-text">Compartir</span> <!-- Texto del botón -->
                <svg
                    class="paper-plane-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                >
                    <path
                        class="paper-plane-path"
                        d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"
                        fill="currentColor" 
                    /><!-- Hereda el color de la clase .paper-plane-icon -->
                </svg>
            </button>
        </div>
    </div>
</body>
@endsection
</html>