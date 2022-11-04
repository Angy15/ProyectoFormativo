@extends('layouts.main')

@section('titulo', 'Pedidos')
@section('content')

@if($mensaje = Session::get('exito'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $mensaje }}</p>
    <button type="button" class ="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="mt-3">
        <a href="{{ route('pedidos.create') }}" class="btn btn-secondary">
            Crear nuevo pedido
        </a>
    </div>

    
<div class="my-3 text-center">
 
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pedidoUsuario as $item)
            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->apellido }}</td>
                <td>{{ $item->direccion }}</td>

                <td class="">
                    <a href="{{ route('pedidos.show', $item->id) }}" class="btn btn-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('pedidos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-circle"><i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
    <script>
        (() => {
        'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    </script>
@endsection