<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
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
            <h2 class="text-center">¿Quienes somos?</h2>
            <p class="fs-4 fw-lighter my-5">Somos una micro empresa dedicada a la venta de masa a base de maiz,Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br> Asperiores,  totam veniam quos vel vero reiciendis maiores, incidunt voluptatum dolorum architecto magni non ullam unde, <br> sunt sint iure cum laboriosam aspernatur!</p>
            <img src="{{ asset('images/card1.jpg') }}" alt="Foto maiz" class="foto">
        </main>
        <main class="px-3">
            <h2 class="text-center">Nuestros productos</h2>
            <p class="fs-4 fw-lighter my-5">En masa Express manejamos dos tipos de productos. <br> la masa amarrilla o la masa blanca, puede eligir la que mas prefiera con la cantidad que necesite.</p>
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('images/masaAmarilla.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Masa amarilla.</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="{{ asset('images/masaBlanca.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Masa blanca.</p>
              </div>
            </div>
          </main>
          <div class="comprar">
            <a href="#" class="btn btn-secondary">
            Comprar <i class="fa-solid fa-cart-shopping"></i>
            </a>
          </div>
        <footer class="mt-auto">
        <main class="px-3">
            <h2 class="text-center">¿Donde nos ubicamos?</h2>
            <p class="fs-4 fw-lighter my-5">Estamos ubicados en el sur de ibague. <br> barrio boquero .... </p>
        </main>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15912.071135093156!2d-75.27377476739471!3d4.407771243045708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38dcb156a69f67%3A0x9e297f873344ef48!2sBoqueron%2C%20Ibagu%C3%A9%2C%20Tolima!5e0!3m2!1ses!2sco!4v1666737415803!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </footer>

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>