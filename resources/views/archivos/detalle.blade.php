<!DOCTYPE html>
<html lang="en">

<head>
    <title>Archivos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Estilos CSS de Bootstrap y DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    @vite('resources/js/dashboard.js')

</head>


@extends('layouts.prueba')
@section('content')

    <body
        style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}'); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">

        <div class="container-titulo">
            <p style="color: white; font-size:30px">
                Historial laboral de: {{ $datos->subcarpeta->carpeta->nombre ?? 'Sin nombre' }}
            </p>
        </div>

        <div style="background: rgba(255, 255, 255, 0.76); font-weight: bold; border-radius:10px; padding:10px; heigth:100%; ">


            <table id="tb_carpetas" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivos as $item)
                        <tr>
                            <td>{{ $item->nombre_archivo }}</td>
                            <td>
                                <a href="{{ route('descargar.archivos', $item->id) }}">
                                    <i class="fa-solid fa-cloud-arrow-down" title="Descargar Archivo"></i>
                                </a>
                                {{-- <a>
                                    <i class="fa-solid fa-eye fa-lg text-primary"
                                        onclick="previsualizarArchivo({{ $item->id }})" title="Ver archivo"
                                        aria-hidden="true"></i>
                                </a> --}}
                                <a href="{{ asset('storage/' . $item->ruta_archivo) }}" target="_blank">
                                    <i class="fa-solid fa-eye fa-lg text-primary" title="Ver archivo"
                                        aria-hidden="true"></i>
                                </a>
                                <form action="{{ route('delete.archivo', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" style="border:none; background:none;">
                                        <i class="fa-solid fa-trash" style="color:red;" title="Eliminar"></i>
                                    </button>
                                </form>
                                <a href="{{ route('vista.actualizar', $item->id) }}">
                                    <i class="fa-solid fa-pen-to-square" title="Actualizar archivo"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </body>
@endsection

</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tb_carpetas').DataTable();
    });

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
