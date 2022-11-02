@extends('layouts.main')

@section('titulo', 'Nuevo pedido')
@section('content')
    
    <form action="{{ route('pedidos.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf 
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <select class="form-select" name="producto_id" id="producto_id" value='{{ $pedido->producto_id }}' required>
                        <option selected value="">Seleccione...</option>
                        @foreach ($producto as $item)
                            <option value="{{ $item->id }}">{{ $item->tipo }}</option>    
                        @endforeach
                    </select>
                    <label for="producto_id">Tipo de masa</label>  
                    <div class="invalid-feedback">
                        Debe seleccionar un producto
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="{{ $pedido->cantidad }}" required>
                    <label for="cantidad">Cantidad (En libras)</label>
                </div>
            </div>
        </div>

        <h4>Datos del Cliente: </h4>

        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="nombreCliente" value="{{ $pedido->nombreCliente }}" required>
                    <label for="nombreCliente">Nombre: </label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellidoCliente" name="apellidoCliente" placeholder="apellidoCliente" value="{{ $pedido->apellidoCliente }}" required>
                    <label for="apellidoCliente">Apellido: </label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccionCliente" name="direccionCliente" placeholder="direccionCliente" value="{{ $pedido->direccionCliente }}" required>
            <label for="direccionCliente">Dirección: </label>
        </div>
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="correoCliente" name="correoCliente" placeholder="correoCliente" value="{{ $pedido->correoCliente }}" required>
                    <label for="correoCliente">Correo: </label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="contactoCliente" name="contactoCliente" placeholder="contactoCliente" minlength="11" maxlength="11" value="{{ $pedido->contactoCliente }}" required>
                    <label for="contactoCliente">Teléfono: </label>
                </div>
            </div>
        </div>
        <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
    </form>

@endsection 

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        // Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e) {
            // Para el lanzamiento del evento
            e.preventDefault();
            // Lanzar alerta de SweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el proyecto?',
                text: "¡Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: '¡Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection