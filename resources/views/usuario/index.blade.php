@extends('layouts.main')

@section('titulo', 'Usuarios')

@section('content')
<div class="container">
    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if($mensaje = Session::get('warning'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   
    @endif
    <div class="my-3">
        @if(count($usuarios) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $item)
                    <tr>
                        <td>{{ $item->name}}</td>
                        <td class="d-flex">
                            <a href="{{ route('usuarios.show', $item->id) }}" class="btn btn-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye fa-beat"></i></a>
                            <a href="{{ route('usuarios.edit', $item->id) }}" class="btn btn-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square fa-beat"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $usuarios->links() }}
        @else
            <p>La búsqueda no arrojó resultados</p>
        @endif
    </div>
    <form class="d-flex" role="search">
        <input class="form-control me-2 shadow" type="search" placeholder="Buscar..." name="buscar" aria-label="buscar">
        <button class="btn btn-secondary shadow" type="submit">Buscar</button>
    </form>
</div>

@endsection