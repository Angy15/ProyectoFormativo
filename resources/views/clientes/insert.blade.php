<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('clientes.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            <label for="nombre">Nombre</label>
            <div class="invalid-feedback">
                Debe ingresar el nombre del cliente
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
            <label for="apellido">Apellido</label>
            <div class="invalid-feedback">
                Debe ingresar el apellido del cliente
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" minlength="10" maxlength="10" required>
            <label for="telefono">Telefono</label>
            <div class="invalid-feedback">
                El número de teléfono debe contener 10 dígitos.
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
            <label for="direccion">Dirección</label>
            <div class="invalid-feedback">
                Debe ingresar la dirección del cliente
            </div>
        </div>
        {{-- <div class="form-floating mb-3">
            <select class="form-select" id="proyecto_id" name="proyecto_id" required>
                <option selected >Selecione...</option>
                @foreach($proyectos as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            <label for="proyecto_id">Proyecto</label>
            <div class="invalid-feedback">
                Debe seleccionar un proyecto
            </div>

        </div> --}}
        <button type="submit" class="btn btn-secondary">Guardar</button>
    </form>
@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
             event.preventDefault()
             event.stopPropagation()
         }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    </script>

@endsection
    
</body>
</html>