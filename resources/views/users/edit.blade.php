@extends('layouts.backoffice')
@section('title','Editar Usuario')
@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Editar Usuario</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('users.update',$user) }}">
      @method('PUT')
      @include('users._form', ['user'=>$user])
    </form>
  </div>
</div>
@endsection
