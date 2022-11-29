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
  <header class="mb-auto">
      <img src="{{ asset('images/logo.png') }}" alt="Logo SENA" class="logo">
      <nav class="navbar fixed-top shadow" id="navbar">
          <div class="container-fluid">
            <a class="navbar-brand" href="#" id="masa1">Bienvenidos a MasaExpress</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Masa Express</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#titulos1">¿Quiénes somos?</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#titulos2">Nuestros productos</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#titulos3">¿Dónde nos ubicamos?</a>
                      </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
  </header>

  <main class="container-fluid mb-auto">
    <div class="justify-content-center align-items-center">
      <br>
      <br>
      <br>
        <h2 class="text-center" id="titulos1">¿Quiénes somos?</h2>
        <p class="fs-4 fw-lighter my-5" id="parrafo">Somos una micro-empresa enfocada en la preparación, venta y distribución <br>
                                                      de masas preparadas a base de maíz, las cuales sirven para la elaboración de: <br> arepas, empanadas, marranitas y todas sus preparaciones. </p>
        
        <img src="{{ asset('images/card1.jpg') }}" alt="Foto maiz" class="foto shadow" >
    </div>
    <div class="justify-content-center align-items-center">
        <h2 class="text-center" id="titulos2">Nuestros productos</h2>
        <p class="fs-4 fw-lighter my-5" id="parrafo">En masa Express manejamos dos tipos de productos. <br> La masa amarrilla o la masa blanca, puede eligir la que mas prefiera con la cantidad que necesite.</p>
        @foreach ($productos as $item)
        <div class="card shadow" style="width: 18rem;">
          <img src="{{ asset('storage'). '/'. $item->imagen }}" alt="imagen" class="img-fluid img-miniatura">
          <div class="card-body">
            <p class="card-text">{{$item->tipo}}. <br>Precio: ${{$item->precio}} por libra.</p>
          </div>
        </div>

        @endforeach


        {{-- <div class="card" style="width: 18rem;">
          <img src="{{ asset('images/masaBlanca.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Masa blanca.</p>
          </div>
        </div>
      </div> --}}

      {{-- <div class="row row-cols-1 row-cols-md g-2 mb-3 ">
        <div class="col">
          @foreach ($productos as $item)
          <div class="card h-10" style="width: 20rem;">
            <img src="{{ asset('storage'). '/'. $item->imagen }}" class="card-img-top" alt="imagen">
            <div class="card-body">
              <h5 class="card-title text-center">{{$item->tipo}}</h5>
              <p class="card-text">Precio: ${{$item->precio}} lb</p>
            </div>
          </div>
          @endforeach
        </div>
      </div> --}}

      <div class="comprar">
        <a href="{{ route('pedidos.index')}}" id="botonCompra" class="btn btn-warning">
        Comprar <i class="fa-solid fa-cart-shopping fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;" ></i>
        </a>
      </div>
      <h2 class="text-center" id="titulos3">¿Dónde nos ubicamos?</h2>
      <div class="row-2 px-3">
            <p class="fs-4 fw-lighter my-5" id="parrafo">Estamos ubicados en el sur de la ciudad Ibagué. <br> Barrio Boqueron Av. Rogelio Benitez, Cd. del Este, Paraguay. </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15912.071135093156!2d-75.27377476739471!3d4.407771243045708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38dcb156a69f67%3A0x9e297f873344ef48!2sBoqueron%2C%20Ibagu%C3%A9%2C%20Tolima!5e0!3m2!1ses!2sco!4v1666737415803!5m2!1ses!2sco" width="450" height="250" style="border:0;" allowfullscreen="" class="location shadow" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      
  </main>

  <footer class="mt-auto">
      
  </footer>

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>


