<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Archivo</title>
</head>
<body>
    <div>
        <form action="{{route('actualizar.archivo')}}" method="POST">
            @csrf
            @method('PUT')
            <label for="nombre">{{$archivo->nombre_archivo}}</label>
            <input name="archivo" type="file" value="">
            <button type="submit">actualizar</button>

        </form>
    </div>
    
</body>
</html>