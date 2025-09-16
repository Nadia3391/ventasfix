@extends('layouts.backoffice')
@section('title','Usuarios')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Usuarios</h5>
    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
  </div>

  <div class="card-body">
    @if(session('ok'))   <div class="alert alert-success">{{ session('ok') }}</div> @endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div> @endif

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th><th>RUT</th><th>Nombre</th><th>Apellido</th><th>Email</th><th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($users as $u)
          <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->rut }}</td>
            <td>{{ $u->nombre }}</td>
            <td>{{ $u->apellido }}</td>
            <td>{{ $u->email }}</td>
            <td class="text-end">
              <a class="btn btn-sm btn-info" href="{{ route('users.edit',$u) }}">Editar</a>
              <form action="{{ route('users.destroy',$u) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center">Sin usuarios aún.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>

    {{ $users->links() }}
  </div>
</div>
@endsection
