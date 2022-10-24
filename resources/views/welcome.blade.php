<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('css/main.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>Masa Express</title>
</head>
<body>
    <body> 
        <header class="mb-auto">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SENA" class="logo">
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Bienvenidos</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Masa Express</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Administrador
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a class="dropdown-item" href="{{ route('productos.index')}}">Ingresar</a></li>
                            </ul>
                          </li>
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">¿Quienes somos?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Nuestros productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">¿Donde nos ubicamos?</a>
                            </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
        </header>
        <main class="px-3">
            {{-- <h1 class="text-center">Proyecto formativo</h1>
            <p class="fs-4 fw-lighter my-5">Masa Express</p> --}}
        </main>
        <footer class="mt-auto">

        </footer>

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>