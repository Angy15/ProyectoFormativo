@extends('layouts.main')

@section('titulo', 'Editar producto')

@section('content')

<form action="{{ route('productos.update', $producto->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @method('PUT')
        @csrf 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="tipo" placeholder="tipo" value="{{ $producto->tipo }}" required>
            <label for="tipo">Tipo de masa</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" value="{{ $producto->descripcion }}" required>
            <label for="descripcion">Descripción</label>
        </div>
        <div class="form-floating mb-3">
            @if(@isset($producto->imagen))
                <img src="{{ asset('storage'). '/'. $producto->imagen }}" alt="imagen" class="img-fluid img-miniatura" width="120px">  
            @endif
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" value="{{ $producto->precio }}" required>
            <label for="precio">Precio</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="existencia" name="existencia" placeholder="existencia" value="{{ $producto->existencia }}" required>
            <label for="existencia">Existencia</label>
        </div>
        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
    </form>

@endsection

@section('scripts')
    <script>
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