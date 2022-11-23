@extends('layouts.main')

@section('titulo', 'Detalle de usuario')

@section('content')

            <div class="col-md-6 ">
                
                <table class="table table-bordered">
                    <tr>
                        <td>Nombre</td>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                   

                   
                </table>

                <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i></a>
            </div>



@endsection
