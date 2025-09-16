@extends('layouts.backoffice')
@section('title','Editar Cliente')
@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Editar Cliente</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('clients.update',$client) }}">
      @method('PUT')
      @include('clients._form', ['client'=>$client])
    </form>
  </div>
</div>
@endsection
