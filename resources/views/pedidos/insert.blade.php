@extends('layouts.main')

@section('titulo', 'Nuevo pedido')
@section('content')
    
    <form action="{{ route('pedidos.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf 

        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="user_id" name="user_id"  value="{{ auth()->user()->id}}" required>
            <label for="tipo">id de usuario</label>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{ auth()->user()->name }}" required>
                    <label for="nombre">Nombres</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                    <label for="apellido">Apellido</label>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Identificación</label>
            <select class="form-select" name="tipoIdentificacion" id="tipoIdentificacion">
                <option selected>Seleccione...</option>
                <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                <option value="Extranjera">Extranjera</option>
            </select>
            <input type="text" id="numIdentificacion" name="numIdentificacion" class="form-control" aria-label="Text input with dropdown button" minlength="10" maxlength="10">
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
                    <label for="direccion">Dirección</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" minlength="10" maxlength="10" required>
                    <label for="telefono">Teléfono</label>
                </div>
            </div>
        </div>
       
        <hr>
        
       
        <div class="form-floating mb-3">
            <select name="productos_id" id="productos_id" class="form-select" required>
                <option selected value="" disabled>Seleccione...</option>
                @foreach ($productos as $item )
                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                @endforeach
            </select>
            <label for="productos_id">Productos</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" required>
            <label for="cantidad">Cantidad en libras</label>
        </div>
        <div class="form-floating mb-3">
            <select name="productos2_id" id="productos2_id" class="form-select">
                <option selected value="" disabled>Seleccione producto 2</option>
                @foreach ($productos as $item )
                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                @endforeach
            </select>
            <label for="productos_id">Producto 2 "opcional"</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="cantidad2" name="cantidad2" placeholder="cantidad2">
            <label for="cantidad2">Cantidad de masa producto 2</label>
        </div>
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="estado" name="estado"  value="En espera" required>
            <label for="estado"></label>
        </div>

        <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
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