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
        <a href="{{ route('pedidos.create') }}" class="btn btn-secondary shadow">
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

                <td class="d-flex justify-content-center">
                    <a href="{{ route('pedidos.show', $item->id) }}" class="btn btn-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye fa-beat"></i></a>
                    @if($item->estado=="En proceso")  

                    <a  href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-secondary justify-content-start rounded-circle disabled" aria-disabled="true"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('pedidos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary rounded-circle disabled" aria-disabled="true"><i class="fa-solid fa-trash-can"></i></button>
                    </form> 

                    @elseif ($item->estado=="Despachado")

                    <a  href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-secondary justify-content-start me-1 rounded-circle disabled"  aria-disabled="true"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="{{ route('pedidos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary rounded-circle disabled" aria-disabled="true"><i class="fa-solid fa-trash-can"></i></button>
                    </form>

                    @elseif ($item->estado=="Aceptado")
                     
                    <a  href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square fa-beat"></i></a>
                    <form action="{{ route('pedidos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-circle" ><i class="fa-solid fa-trash-can fa-beat"></i></button>
                    </form>

                    @elseif ($item->estado=="En espera")
                    <a  href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square fa-beat"></i></a>
                    <form action="{{ route('pedidos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-circle" ><i class="fa-solid fa-trash-can fa-beat"></i></button>
                    @endif

                    
                </td>
                @if (Auth::user()->hasRol("Administrador"))
                <div class="container">
                    <td>
                        <form action="{{ route('pedidos.updateEstado', $item->id)}}" method="POST" class="form-estados">
                            @method('PUT')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-7">
                                    <select class="form-select justify-content-center"  id="estado" name="estado" aria-label="Default select example">                                
                                        <option selected value="" id="Estado" name="Estado" disabled>Estado de pedido</option>
                                        <option name="Aceptado" value="Aceptado" @if($item->estado=="Aceptado") selected @endif>Aceptado</option>
                                        <option name="En proceso" value="En proceso" @if($item->estado=="En proceso") selected @endif>En proceso</option>
                                        <option name="Despachado" value="Despachado" @if($item->estado=="Despachado") selected @endif>Despachado</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex justify-content-start">
                                        <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-circle-check"></i></button> 
                                    </div>
                                </div>
                            </div>
                        </form>

                </div>
                </td>
                @else
                <td>
                    <p>{{$item->estado}}</p>
                    {{-- <select class="form-select" id="estadosU" name="estadosU" aria-label="Default select example" disabled>
                        <option selected value="selected">{{$item->estado}}</option>
                    </select> --}}
                </td> 
                @endif
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
{{-- Función actualizar --}}
<script type="text/javascript">
function actualizar(){location.reload(true);}
//Función para actualizar cada 5 minutos(50000 milisegundos)
setInterval("actualizar()",50000);
</script>
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
                title: '¿Está seguro de eliminar?',
                text: "Ésta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });


        $('.form-estados').submit(function(e){
            e.preventDefault();
            //Lanzar alerta de Sweetalert
            Swal.fire({
                title: '¿Está seguro de cambiar al nuevo estado?',
                text: "¡Podrá volver a cambiar el estado!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'Sí, cambiar!'
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