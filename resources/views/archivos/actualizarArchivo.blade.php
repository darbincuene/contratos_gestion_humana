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
        <form action="{{route('actualizar.archivo')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="archivo_id" value="{{$archivo->id}}">
        
            <label for="file">{{$archivo->nombre_archivo}}</label>
            <input name="file" type="file" id="file">
        
            <button type="submit">Actualizar</button>
        </form>
    </div>

    
    
</body>
</html>