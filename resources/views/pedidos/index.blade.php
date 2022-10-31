@extends('layouts.main')

@section('titulo', 'Pedidos')

@section('content')

<div class="mt-3">
    @can(['administrador'])
    <a href="{{ route('pedidos.create') }}" class="btn btn-secondary">
        Crear nuevo pedido
    </a>
    @endcan
</div>
<div class="my-3">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Pedido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td class="d-flex">
                        <a href="{{ route('pedidos.show', $item->id) }}" class="btn btn-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection