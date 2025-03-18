<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Archivos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    @vite('resources/js/dashboard.js')
</head>
<body>
    <table id="tb_carpetas" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre Subcarpeta</th>
                <th>Nommbre Archivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivos as $item) 
            <tr>
                <td>{{$item->subcarpeta->nombre}}</td>
                <td>{{$item->nombre_archivo}}</td>
                <td><a href="{{route('descargar.archivos', $item->id)}}">descargar</a></td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>