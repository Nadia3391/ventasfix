@extends('layouts.backoffice')

@section('title','Panel VentasFix')
@section('content')
  <div class="row g-3">
    <div class="col-md-4"><div class="card p-3">Usuarios: <strong>{{ $usuarios }}</strong></div></div>
    <div class="col-md-4"><div class="card p-3">Productos: <strong>{{ $productos }}</strong></div></div>
    <div class="col-md-4"><div class="card p-3">Clientes: <strong>{{ $clientes }}</strong></div></div>
  </div>
@endsection
