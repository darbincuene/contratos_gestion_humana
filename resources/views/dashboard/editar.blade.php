
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Archivos</title>
    {{-- @vite('resources/css/editararchivos.css')
    @vite('resources/js/auth.js') --}}
    <link rel="stylesheet" href="{{ asset('css/editararchivos.css') }}">
</head>

<body>
    @extends('layouts.prueba')
    @section('content')
    
    <div class="containerForm">
        <form class="formularioeditar" 
              action="{{ route('actualizar.archivos') }}" 
              enctype="multipart/form-data" 
              method="POST">
            @csrf
            @method('PUT')
    
            <h2 class="text-center mb-4">Editar Archivo</h2>
    
            
            <input type="hidden" name="area_id" value="{{ $Archv->archivos->areas->id }}">
            <input type="hidden" name="archivo_id" value="{{ $Archv->archivos->id }}">
            <input type="hidden" name="subir_archivo_id" value="{{ $Archv->id }}">
    
            <label for="area_nombre">Área</label>
            <select name="area_nombre" id="area_nombre" class="selecionararea" required>
                <option value="{{ $Archv->archivos->areas->nombre }}" selected>{{ $Archv->archivos->areas->nombre }}</option>
                @foreach ($Areas as $item)
                    <option value="{{ $item->nombre }}"  >{{ $item->nombre }}</option>
                @endforeach
            </select>
    
           
            <label for="archivo_descripcion">Descripción</label>
            <input class="inputs" type="text" name="archivo_descripcion" value="{{ $Archv->archivos->descripcion }}" required>
    
            <label for="archivo_actual">Archivo Actual</label>
            <input type="text" class="form-control selecionararea" value="{{ $Archv->nombre_archivo }}" readonly>
    
            <label for="archivo">Subir Nuevo Archivo</label>
            <input type="file" class="form-control" id="archivo" name="archivo" accept="application/pdf,image/*">
    
            <label for="usuarios_id">Usuario</label>
            <select name="usuarios_id" id="usuarios_id" class="selecionararea" required>
                <option value="{{ $Archv->users->id }}"  selected>{{$Archv->users->name }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
    
            <button  class="btnupdate" type="submit">Actualizar Archivo</button>
        </form>
    </div>

</body>

@endsection
</html>
