@extends('layouts.main')

@section('titulo', 'Nuevo estado')
@section('content')
    
    <form action="{{ route('estados.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf 
        <div class="form-floating mb-3">
                <input type="text" class="form-control" id="estado" name="estado" placeholder="estado" required>
                <label for="estado">Estado</label>
        </div>
        <button class="btn btn-primary">Subir</button>
    </form>
@endsection