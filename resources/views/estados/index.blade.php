@extends('layouts.main')

@section('titulo', 'Estados')
@section('content')

@if($mensaje = Session::get('exito'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $mensaje }}</p>
    <button type="button" class ="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="mt-3">
        <a href="{{ route('estados.create') }}" class="btn btn-secondary">
            Crear nuevo estado
        </a>
    </div>
@endsection
