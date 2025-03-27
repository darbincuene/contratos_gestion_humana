<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleDashboard.css') }}">
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
@extends('layouts.prueba')
@section('content')

    <body style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}')">
        <div class="contenedorcargos">
        @foreach ($cargos as $item)
            <a class="filtrararchivos" href="{{ route('filtrar.archivos', $item->id) }}">
                <div class="botones-inicio-dashboard">
                    <button type="submit" class="docente-btn">
                        <img src="{{ asset('imagenes/profesor.png') }}" alt="Docente" class="boton-icon docente-icon">
                        <span class="boton-texto">{{ $item->nombre }}</span>
                    </button>

                </div>
            </a>
        @endforeach
    </div>

    </body>
@endsection

</html>
