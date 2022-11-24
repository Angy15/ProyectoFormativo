@extends('layouts.main')

@section('titulo', 'Informes')

@section('content')

<div class="d-flex justify-content-center">
  <div class="row">
    <div class="col-sm-6">
      <div class="card text-center" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title">Masa Amarilla</h5>
          <p class="card-text">Cantidad de masa vendida:</p>
          <a href="#" class="btn btn-success">0</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card text-center" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title">Masa Blanca</h5>
          <p class="card-text">Cantidad de masa vendida:</p>
          <a href="#" class="btn btn-success">0</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-center">
  <div class="row mt-3">
    <div class="col-sm-6">
      <div class="card text-center" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title">Cantidad Total:</h5>
          <a href="#" class="btn btn-success">0</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card text-center" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title">Precio Total:</h5>
          <a href="#" class="btn btn-success">0</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- <form action="pedidos.store">
  @csrf
  @foreach (  as )
    
  @endforeach
</form> --}}


@endsection