@extends('layouts.navCompartir')

@section('content')
<body style="background-image: url('{{ asset('storage/logos/FOTO2.png') }}')">
    
    <div class="container">
        <h1 class="text-center mt-4">Carpeta: {{ $carpeta->nombre }}</h1>

        @if ($subcarpetas->isEmpty())
            <p class="text-center">No hay archivos en esta carpeta.</p>
        @else
            <div class="list-group mt-4">
                @foreach ($subcarpetas as $subcarpeta)
                    <div class="card mb-3">
                        <div class="card-header  text-black">
                            <h5 class="">{{ $subcarpeta->nombre }}</h5>
                        </div>
                        <div class="card-body">
                            @if ($subcarpeta->archivos->isEmpty())
                                <p>No hay archivos en esta subcarpeta.</p>
                            @else
                                <ul class="list-group">
                                    @foreach ($subcarpeta->archivos as $archivo)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $archivo->nombre_archivo }}
                                            {{-- <a href="{{ route('descargar.archivo', $archivo->id) }}" class="btn btn-success btn-sm">
                                                Descargar
                                            </a> --}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    
</body>
@endsection
