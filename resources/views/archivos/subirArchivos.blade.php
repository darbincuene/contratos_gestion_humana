<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir archivos</title>
</head>
<body>

    <div>
        <form action="{{route('subir.archivos')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <select name="tipo_documento_id" id="">
                    <option >Seleccione un tipo de documento</option>
                        @foreach ($tiposdoc as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                            
                        @endforeach
                </select>
                <input type="hidden" name="subcarpeta_id" value="{{ $subcarpetas->id}}">



                <label for="files">archivos</label>

                <input type="file" name="files[]" multiple required>

                <button type="submit">subir</button>
            </div>


        </form>
    </div>
    
</body>
</html>