<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Carpetas</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleCarpetas.css') }}">
    <!-- Estilos CSS de Bootstrap y DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    @vite('resources/js/dashboard.js')
</head>

<body style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}')">
    @extends('layouts.prueba')
    @section('content')
    <div style="min-height:80vh">
        <div class="container-titulo">
            <h1 class="titulocarpetas">Auditora</h1>
        </div>

        <div style="background: rgba(255, 255, 255, 0.76); font-weight: bold; border-radius:10px; padding:10px; ">
            <table id="tb_carpetas" class="table table-striped table-bordered" style="width:100%; heigth:100%">
                <thead>
                    <tr>
                        <th>Nombre de Carpeta</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargo as $item)
                        <tr>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->cargo->nombre }}</td>
                            <td class="iconos-carpetas">
                                <a href="{{ route('auditoria', $item->id) }}"><i class="fa-solid fa-eye "
                                        title="Ver"></i></a>
                                {{-- <a href="{{ route('descargar.carpeta', $item->id) }}"> <i
                                        class="fa-solid fa-cloud-arrow-down" title="Descargar Carpeta"></i></a>

                                <a href="{{ route('compartir.carpeta', $item->id) }}"> <i class="fa-solid fa-share-nodes"
                                        title="Compartir Carpeta"></i></a>

                                <form action="{{ route('eliminar.archivo', $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" style="border:none; background:none; ">
                                        <i class="fa-solid fa-trash"
                                            style="color:rgba(255, 0, 0, 0.726)";
                                            title="Eliminar"></i>
                                    </button>
                                </form> --}}



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>
<script>$(document).ready(function() {
    $('#tb_carpetas').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true,
        "paging": true
    });
});
</script>

</html>
<!-- Scripts de DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>
