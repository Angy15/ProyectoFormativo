@extends('layouts.main')

@section('titulo', 'Detalle del producto')

@section('content')

<section class="content container-fluid mx-3">
        <div class="row">
            <div class="col-md-5">
                @if(isset($producto->imagen))
                    <img src="{{ asset('storage'). '/'. $producto->imagen }}" alt="imagen" class="img-fluid img-miniatura">
                @endif
            </div>
            <div class="col-md-6">
                
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>{{ $producto->id }}</td>
                    </tr>
                    <tr>
                    <td>Tipo</td>
                    <td>{{ $producto->tipo }}</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td>{{ $producto->descripcion }}</td>
                </tr>
                <tr>
                    <td>precio</td>
                    <td>{{ $producto->precio }}</td>
                </tr>
                <tr>
                    <td>existencias</td>
                    <td>{{ $producto->existencia }}</td>
                </tr>
                
            </table>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>

            </div>
        
</div>


@endsection