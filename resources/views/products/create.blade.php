@extends('layouts.backoffice')
@section('title','Nuevo Producto')
@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Nuevo Producto</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('products.store') }}">
      @include('products._form')
    </form>
  </div>
</div>
@endsection
