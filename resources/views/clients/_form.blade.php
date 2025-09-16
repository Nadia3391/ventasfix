@csrf
<div class="row g-3">
  <div class="col-md-4">
    <label class="form-label">RUT Empresa</label>
    <input name="rut_empresa" value="{{ old('rut_empresa', $client->rut_empresa ?? '') }}" class="form-control" required>
    @error('rut_empresa')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Rubro</label>
    <input name="rubro" value="{{ old('rubro', $client->rubro ?? '') }}" class="form-control" required>
    @error('rubro')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Razón Social</label>
    <input name="razon_social" value="{{ old('razon_social', $client->razon_social ?? '') }}" class="form-control" required>
    @error('razon_social')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-4">
    <label class="form-label">Teléfono</label>
    <input name="telefono" value="{{ old('telefono', $client->telefono ?? '') }}" class="form-control" required>
    @error('telefono')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-8">
    <label class="form-label">Dirección</label>
    <input name="direccion" value="{{ old('direccion', $client->direccion ?? '') }}" class="form-control" required>
    @error('direccion')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Nombre de contacto</label>
    <input name="contacto_nombre" value="{{ old('contacto_nombre', $client->contacto_nombre ?? '') }}" class="form-control" required>
    @error('contacto_nombre')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Email de contacto</label>
    <input type="email" name="contacto_email" value="{{ old('contacto_email', $client->contacto_email ?? '') }}" class="form-control" required>
    @error('contacto_email')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
</div>

<div class="mt-4">
  <button class="btn btn-primary">Guardar</button>
  <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
