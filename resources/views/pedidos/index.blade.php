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

@endsection
