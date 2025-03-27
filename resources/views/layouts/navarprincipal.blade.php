<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navar</title>
    <link rel="stylesheet" href="{{ asset('css/administracion.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lobster&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">


</head>

<header class="headePadre">
    <div>
        <img class="verticalAmarillo"src="{{ asset('storage/logos/horizontalcolorAmarillo.png') }}" alt="verticalAmarillo"  style="width: 250px"/>
    </div>
    <div class="titulosNav">
        <h3 class="linea-abajo-titulo">Sistema de Contratos Gestión Humana</h3>                    
    </div>
</header>
@yield('content')


</html>