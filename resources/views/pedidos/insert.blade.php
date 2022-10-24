@extends('layouts.main')

@section('titulo', 'Nuevo pedido')
@section('content')
    
    <form action="{{ route('pedidos.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf 
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <select class="form-select" name="producto_id" id="producto_id" required>
                        <option selected value="">Seleccione...</option>
                        @foreach ($productos as $item)
                            <option value="{{ $item->id }}">{{ $item->tipo }}</option>    
                        @endforeach
                    </select>
                    <label for="tipo">Tipo de masa</label>  
                    <div class="invalid-feedback">
                        Debe seleccionar un producto
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
                    <label for="descripcion">Cantidad</label>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" name="tipo" placeholder="tipo">
                    <label for="tipo">Tipo de masa (Opcional)</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion">
                    <label for="descripcion">Cantidad</label>
                </div>
            </div>
        </div>

        <h4>Datos del Cliente: </h4>

        <div class="input-group">
            <span class="input-group-text">Nombre y Apellido</span>
            <input type="text" aria-label="First name" class="form-control">
            <input type="text" aria-label="Last name" class="form-control">
          </div>
    </form>

@endsection