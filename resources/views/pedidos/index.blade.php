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
                <th>Dirección</th>
                <th>Acciones</th>
                <th>Estados</th>

               
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
                            <button type="submit" class="btn btn-danger rounded-circle"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                </td>
                @can(['administrador'])
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Aceptado.
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            En proceso.
                        </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
                          <label class="form-check-label" for="flexRadioDefault3">
                              Despachado.
                            </label>
                        </div>
                    </td>
                </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();
            //Lanzar alerta de Sweetalert
            Swal.fire({
                title: '¿Esta seguro de eliminar?',
                text: "Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection