@extends('layouts.main')

@section('titulo', 'Detalle del pedido')

@section('content')

<section class="content container-fluid mx-3">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <td>Tipo</td>
                <td>{{ $pedido->productos }}</td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td>{{ $pedido->cantidad }}</td>
            </tr>
            <h5>Cliente:</h5>
            <tr>
                <td>Nombre Cliente</td>
                <td>{{ $pedido->nombreCliente }}</td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td>{{ $pedido->direccionCliente }}</td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td>{{ $pedido->contactoCliente }}</td>
            </tr>

        </table>

    </div>
        
</div>
<br>
<a href="{{ route('pedidos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
    
</section>

@endsection