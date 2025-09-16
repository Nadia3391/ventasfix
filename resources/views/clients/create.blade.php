@extends('layouts.backoffice')
@section('title','Nuevo Cliente')
@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Nuevo Cliente</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('clients.store') }}">
      @include('clients._form')
    </form>
  </div>
</div>
@endsection
