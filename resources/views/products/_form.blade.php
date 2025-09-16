@csrf
<div class="row g-3">
  <div class="col-md-3">
    <label class="form-label">SKU</label>
    <input name="sku" value="{{ old('sku', $product->sku ?? '') }}" class="form-control" required>
    @error('sku')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-5">
    <label class="form-label">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $product->nombre ?? '') }}" class="form-control" required>
    @error('nombre')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Imagen (URL)</label>
    <input type="url" name="imagen_url" value="{{ old('imagen_url', $product->imagen_url ?? '') }}" class="form-control" required>
    @error('imagen_url')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Descripción corta</label>
    <input name="descripcion_corta" value="{{ old('descripcion_corta', $product->descripcion_corta ?? '') }}" class="form-control" required>
    @error('descripcion_corta')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Descripción larga</label>
    <textarea name="descripcion_larga" class="form-control" rows="2">{{ old('descripcion_larga', $product->descripcion_larga ?? '') }}</textarea>
  </div>

  <div class="col-md-3">
    <label class="form-label">Precio neto (CLP)</label>
    <input type="number" min="0" name="precio_neto" id="precio_neto"
           value="{{ old('precio_neto', $product->precio_neto ?? 0) }}" class="form-control" required>
    @error('precio_neto')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">Precio venta (IVA 19%)</label>
    <input type="number" id="precio_venta_preview"
           value="{{ old('precio_neto', $product->precio_neto ?? 0) ? round((old('precio_neto', $product->precio_neto ?? 0))*1.19) : '' }}"
           class="form-control" readonly>
    <div class="form-text">Se calcula automáticamente al guardar.</div>
  </div>

  <div class="col-md-2">
    <label class="form-label">Stock actual</label>
    <input type="number" min="0" name="stock_actual" value="{{ old('stock_actual', $product->stock_actual ?? 0) }}" class="form-control" required>
  </div>
  <div class="col-md-2">
    <label class="form-label">Stock mínimo</label>
    <input type="number" min="0" name="stock_minimo" value="{{ old('stock_minimo', $product->stock_minimo ?? 0) }}" class="form-control" required>
  </div>
  <div class="col-md-2">
    <label class="form-label">Stock bajo</label>
    <input type="number" min="0" name="stock_bajo" value="{{ old('stock_bajo', $product->stock_bajo ?? 0) }}" class="form-control" required>
  </div>
  <div class="col-md-2">
    <label class="form-label">Stock alto</label>
    <input type="number" min="0" name="stock_alto" value="{{ old('stock_alto', $product->stock_alto ?? 0) }}" class="form-control" required>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const neto = document.getElementById('precio_neto');
    const pv   = document.getElementById('precio_venta_preview');
    function upd(){ pv.value = neto.value ? Math.round(parseInt(neto.value,10)*1.19) : ''; }
    if(neto && pv){ neto.addEventListener('input', upd); upd(); }
  });
</script>
@endpush

<div class="mt-4">
  <button class="btn btn-primary">Guardar</button>
  <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
