<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auditoria</title>
    <link rel="icon" type="image" href="{{ asset('storage/logos/ESTRELLA.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></script>
</head>
<body>
    @extends('layouts.prueba')
    @section('content')
    <div class="card shadow-lg border-0 rounded-3">
      <div class="card-header">
        Información relevante sobre la historia laboral de: <span class="text-uppercase">{{$auditoria->carpeta->nombre}}</span>
      </div>
      <div class="card-body">
        <h5 class="text-success">✔ La historia laboral fue creada con éxito el {{$auditoria->created_at}}</h5>
        <hr>
        <h5 class="fw-bold">Detalles de la Carpeta</h5>
        <ul class="list-group list-group-flush">
          <p><strong>Nombre: </strong>{{$auditoria->carpeta->nombre}}</p>
          <p><strong>Cargo por el cual se realizao la carpeta: </strong>{{$auditoria->carpeta->cargo->nombre}}</p>
        </ul>
        <hr>
        <h5 class="fw-bold">Modificaciones realizadas por</h5>
        <p><strong>Nombre:</strong> {{$auditoria->usuario->name}}</p>
        <p><strong>Correo electrónico:</strong> {{$auditoria->usuario->email}}</p>
        <p><strong>Fecha de última modificación:</strong> {{$auditoria->updated_at}}</p>
        <p><strong>La acción que realizo fue:</strong> {{$auditoria->accion}}</p>
      </div>
    </div>
    

    @endsection
</body>
</html>