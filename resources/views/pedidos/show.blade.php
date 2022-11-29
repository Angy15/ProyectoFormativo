@extends('layouts.main')

@section('titulo', 'Detalle del pedido')

@section('content')
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>Nombre</td>
                <td>{{ $pedidos->nombre }}</td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td>{{ $pedidos->apellido }}</td>
            </tr>
            <tr>
                <td>Tipo de Identificación</td>
                <td>{{ $pedidos->tipoIdentificacion }}</td>
            </tr>
            <tr>
                <td>Número</td>
                <td>{{ $pedidos->numIdentificacion }}</td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>{{ $pedidos->telefono }}</td>
            </tr>
            <tr>    
                <td>Dirección</td>
                <td>{{ $pedidos->direccion }}</td>
            </tr>
            <tr>
                <td>Producto 1</td>
                <td>{{ $pedidos->productos }}</td>
            </tr>
            <tr>
                <td>Cantidad 1</td>
                <td>{{ $pedidos->cantidad }} libras</td>
            </tr>
            <tr>
                <td>precio 1</td>
                <td>{{ $pedidos->precioUni1 }}</td>
            </tr>
            <tr>
                <td>Producto 2</td>
                <td>{{ $pedidos->productos2}}</td>
            </tr>
            <tr>
                <td>Cantidad 1</td>
                <td>{{ $pedidos->cantidad2 }} libras</td>
            </tr>
            <tr>
                <td>Precio 2</td>
                <td>{{ $pedidos->precioUni2 }} </td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{ $pedidos->estado }}</td>
            </tr>
        </table>
        <a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left fa-beat"></i></a>
    </div>
    <div class="col-md-6 align-self-center">
        <div class="card text-center" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title">Precio Total:</h5>
                <a href="" class="btn btn-success">0</a>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        //Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e){
            // Para el lanzamiento del evento
            e.preventDefault();
            //Lanzar alerta de sweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el producto?',
                text: "¡Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dc4545',
                confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });

        $('.form-estados').submit(function(e){
            e.preventDefault();
            //Lanzar alerta de Sweetalert
            Swal.fire({
                title: '¿Está seguro de cambiar al nuevo estado?',
                text: "¡Podrá volver a cambiar el estado!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Sí, cambiar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection