@extends('layouts.backoffice')
@section('title','Editar Producto')
@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Editar Producto</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('products.update',$product) }}">
      @method('PUT')
      @include('products._form', ['product'=>$product])
    </form>
  </div>
</div>
@endsection
