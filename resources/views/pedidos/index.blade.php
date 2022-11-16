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
                @if (Auth::user()->hasRol("Administrador"))
                <td>
                    <select class="form-select"  id="estados" name="estados" aria-label="Default select example">
                        <option selected name="opciones" disabled>Estado de pedido</option>
                        <option name="aceptado" value="1">Aceptado</option>
                        <option name="enProceso" value="2">En proceso</option>
                        <option name="despachado" value="3">Despachado</option>
                    </select>
                </td>
                @else
                <td>
                    <select class="form-select" id="estadosU" name="estadosU" aria-label="Default select example" disabled>
                        <option selected value="selected"></option>
                    </select>
                </td> 
                @endif
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
            {{-- <script type="text/javascript">
                funtion ShowSelected()
                {
                    var combo = document.getElementById('estados').value;
                    var selected = combo.options[combo.selectedIndex].text;
                    alert(selected);
                }
            </script> --}}