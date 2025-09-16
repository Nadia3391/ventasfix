@extends('layouts.backoffice')
@section('title','Clientes')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Clientes</h5>
    <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
  </div>

  <div class="card-body">
    @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th><th>RUT Empresa</th><th>Razón Social</th>
            <th>Rubro</th><th>Teléfono</th><th>Contacto</th><th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($clients as $c)
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->rut_empresa }}</td>
            <td>{{ $c->razon_social }}</td>
            <td>{{ $c->rubro }}</td>
            <td>{{ $c->telefono }}</td>
            <td>{{ $c->contacto_nombre }}<br><small>{{ $c->contacto_email }}</small></td>
            <td class="text-end">
              <a class="btn btn-sm btn-info" href="{{ route('clients.edit',$c) }}">Editar</a>
              <form action="{{ route('clients.destroy',$c) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center">Sin clientes aún.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>

    {{ $clients->links() }}
  </div>
</div>
@endsection
