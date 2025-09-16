@extends('layouts.backoffice')
@section('title','Nuevo Usuario')
@section('content')
<div class="card">
  <div class="card-header"><h5 class="mb-0">Nuevo Usuario</h5></div>
  <div class="card-body">
    <form method="POST" action="{{ route('users.store') }}">
      @include('users._form')
    </form>
  </div>
</div>
@endsection
