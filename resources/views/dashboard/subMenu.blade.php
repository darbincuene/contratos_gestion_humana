<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="{{ asset('css/styleSubMenu.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
@extends('layouts.navarprincipal') 
@section('content')
<body>
    <div class="SubMenu-contenedor">
        <h1 class="subMenu_titulo"> SUB MENU</h1>
        <div class="subMenu-opciones">
            <!-- Botón para Consultar Historias Laborales -->
            <button class="boton-historiasLaborales">
                <span class="menu-texto">Consultar Historias Laborales</span> <!-- Texto del botón -->
                <i class="fas fa-file-alt document"></i> <!-- Icono principal -->
                <i class="fas fa-search search-icon"></i> <!-- Icono de animación -->
            </button>
            <!-- Botón para Cargar Historias Laborales -->
            <button class="botones-carga">
                <span class="menu-texto">Cargar Historias Laborales</span> <!-- Texto del botón -->
                <i class="fas fa-file-alt document"></i> <!-- Icono principal (documento) -->
                <i class="fas fa-arrow-up upload-icon"></i> <!-- Icono de animación (flecha hacia arriba) -->
            </button>
            <!-- Botón para Atrás -->
            <button class="botones-atras">
                <span class="menu-texto">Atrás</span> <!-- Texto del botón -->
                <i class="fas fa-arrow-left arrow-icon"></i> <!-- Icono principal (flecha hacia la izquierda) -->
                <i class="fas fa-undo undo-icon"></i> <!-- Icono de animación (flecha de retroceso) -->
            </button>
        </div>
    </div>
</body>
@endsection
</html>