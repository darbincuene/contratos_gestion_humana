<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administración')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lobster&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styleBienvenido.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    
    <header class="headePadre">
        <div class="imagen">
            <img class="verticalAmarillo"src="{{ asset('storage/logos/horizontalfullcolor.png') }}" style="width: 250px" alt="verticalAmarillo" />
        </div>
        <div class="titulosNav">
            <h3 class="linea-abajo-titulo">Sistema de Contratos Gestión Humana</h3>            
            
        </div>
    </header>
    

    <div class="container-fluid">
        <div class="row">
            
    
            
            
            <!-- Contenido principal -->
            <main  class="col-12 col-md-9 mt-4">
                @yield('content')
            </main>
        </div>
    </div>
    <footer class="text-center py-5 ">
        
            <p class="mb-2">
                Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación Nacional – Resolución No. 944 de 1996 MEN – SNIES 2731
            </p>
            <p class="mb-2">
                <strong>Sede Principal:</strong> Cra. 122 No. 12-459 Pance, Cali – Colombia<br>
                Teléfonos: +57 (2) 555 2767 – +57 (2) 312 0038

            <p class="small mb-0">© 2025 Universidad Católica. Todos los derechos reservados.</p>
        
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>