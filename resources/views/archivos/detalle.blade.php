<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Archivos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    @vite('resources/js/dashboard.js')
</head>
<body>
    @extends('layouts.prueba')
    @section('content')
    <table id="tb_carpetas" class="table table-striped table-bordered" style="width:100%">
        <div><p>Historial laboral de: {{$datos->subcarpeta->carpeta->nombre}}</p></div>
        <thead>
            <tr>
                {{-- <th>Nombre Subcarpeta</th> --}}
                <th>Nombre Archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivos as $item) 
            <tr>
                <td>{{$item->nombre_archivo}}</td>
                <td><a href="{{route('descargar.archivos', $item->id)}}">descargar</a>
                    <form action="{{ route('eliminar.subcarpeta', $datos->subcarpeta->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        
                        <button type="submit">
                        <i></i> Eliminar
                        </button>
                    </form>
                </td>
                 
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection 
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>