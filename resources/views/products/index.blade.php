@extends('layouts.backoffice')
@section('title','Productos')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Productos</h5>
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Nuevo</a>
  </div>

  <div class="card-body">
    @if(session('ok'))<div class="alert alert-success">{{ session('ok') }}</div>@endif

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th><th>SKU</th><th>Nombre</th>
            <th>Precio Neto</th><th>Precio Venta</th>
            <th>Stock</th><th>Estado</th><th></th>
          </tr>
        </thead>
        <tbody>
        @forelse($products as $p)
          <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->nombre }}</td>
            <td>${{ number_format($p->precio_neto,0,',','.') }}</td>
            <td>${{ number_format($p->precio_venta,0,',','.') }}</td>
            <td>{{ $p->stock_actual }}</td>
            <td>
              @php $status = $p->stock_status; @endphp
              <span class="badge 
                {{ $status==='crítico' ? 'bg-danger' : ($status==='bajo' ? 'bg-warning' : ($status==='alto' ? 'bg-primary' : 'bg-success')) }}">
                {{ $status }}
              </span>
            </td>
            <td class="text-end">
              <a class="btn btn-sm btn-info" href="{{ route('products.edit',$p) }}">Editar</a>
              <form action="{{ route('products.destroy',$p) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="8" class="text-center">Sin productos aún.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>

    {{ $products->links() }}
  </div>
</div>
@endsection
