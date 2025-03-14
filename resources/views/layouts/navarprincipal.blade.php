<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navar</title>
    <link rel="stylesheet" href="{{ asset('css/administracion.css') }}">

</head>

<header class="headePadre">
    <div>
        <img class="verticalAmarillo"src="{{ asset('storage/logos/horizontal_full_color.png') }}" alt="verticalAmarillo" />
    </div>
    <div class="titulosNav">
        <h3>Historial Laboral</h3>
        <p>Aplicativo para gestionar el historial laboral</p>
        
    </div>
</header>
@yield('content')
</html>