<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Archivos</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    @vite('resources/js/dashboard.js')
</head>

<body>
    @extends('layouts.prueba')
    @section('content')
        <table id="tb_carpetas" class="table table-striped table-bordered" style="width:100%">
            <div>
                <p>Historial laboral de: {{ $datos->subcarpeta->carpeta->nombre ?? 'Sin nombre' }}</p>
            </div>
            <thead>
                <tr>
                    {{-- <th>Nombre Subcarpeta</th> --}}
                    <th>Nombre Archivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivos as $item)
                    <tr>
                        <td>{{ $item->nombre_archivo }}</td>
                        <td>
                            <a href="{{ route('descargar.archivos', $item->id) }}"><i class="fa-solid fa-cloud-arrow-down" title="Descargar Archivo"></i></a>
                            <a><i class="fa-solid fa-eye fa-lg text-primary"
                                    onclick="previsualizarArchivo({{ $item->id }})" title="Ver archivo"
                                    aria-hidden="true"></i></a>
                            <form action="{{ route('eliminar.subcarpeta', $datos->subcarpeta->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" style="border:none; background:none; ">
                                    <i class="fa-solid fa-trash"
                                        style="color:rgba(255, 0, 0, 0.726);
                                        title="
                                        Eliminar"></i>
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

<script>
    function previsualizarArchivo(archivoId) {
        fetch(`/ver/archivo/${archivoId}`)
            .then(response => response.json())
            .then(data => {
                if (data.url) {
                    window.open(data.url, '_blank');
                } else {
                    alert('No se pudo cargar la vista previa.');
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>
