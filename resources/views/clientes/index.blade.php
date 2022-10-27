@extends('layouts.main')

@section('titulo', 'Clientes')

@section('content')

<div class="mt-3">
    @can(['administrador'])
    <a href="{{ route('clientes.create') }}" class="btn btn-secondary">
        Crear nuevo cliente
    </a>
    @endcan
</div>

