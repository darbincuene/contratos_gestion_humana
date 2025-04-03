<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Carpeta</title>
    <link rel="stylesheet" href="{{ asset('css/styleCrearCarpeta.css') }}">
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">

</head>



<body  style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}')">
    @extends('layouts.prueba')
    @section('content')
        <div class="div-invisible">
            <div class="crearCarpeta">
                <h1>Crear Carpeta</h1>

                <form action="{{ route('crear.carpeta') }}" method="POST">
                    @csrf
                    <div class="carpeta">
                        {{-- <label for="nombre">Nombre de carpeta:</label> --}}
                        <input class="inputplaceholder" required="required" type="text" name="nombre_carpeta"
                            placeholder="Nombre de la Carpeta">

                    </div>
                    <div class="prueba">
                        <div class="cargo" id="cargosselect">
                            <select  name="cargo_id">
                                <option   value="">Nombre Cargo</option>
                                @foreach ($cargo as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="divbotoncarpetas">
                        <button class="button">
                            <span class="button-content">Crear </span>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    @endsection

</body>


</html>
