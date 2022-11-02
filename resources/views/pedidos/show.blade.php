@extends('layouts.main')

@section('titulo', 'Detalle del pedido')

@section('content')

<section class="content container-fluid mx-3">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>{{ $pedidos->id }}</td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td>
                   {{ $pedidos->masa }}
                </td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td>{{ $pedidos->cantidad }}</td>
            </tr>
            <h5>Cliente:</h5>
            <tr>
                <td>Nombre Cliente</td>
                <td>{{ $pedidos->nombreCliente }}</td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td>{{ $pedidos->direccionCliente }}</td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>{{ $pedidos->contactoCliente }}</td>
            </tr>

        </table>

    </div>
        
</div>
<br>
<a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
    
</section>

@endsection