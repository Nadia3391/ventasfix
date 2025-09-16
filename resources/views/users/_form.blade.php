@csrf
<div class="row g-3">
  <div class="col-md-4">
    <label class="form-label">RUT</label>
    <input name="rut" value="{{ old('rut', $user->rut ?? '') }}" class="form-control" required>
    @error('rut')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Nombre</label>
    <input name="nombre" value="{{ old('nombre', $user->nombre ?? '') }}" class="form-control" required>
    @error('nombre')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Apellido</label>
    <input name="apellido" value="{{ old('apellido', $user->apellido ?? '') }}" class="form-control" required>
    @error('apellido')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-6">
    <label class="form-label">Email (@ventasfix.cl)</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" required>
    @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>

  <div class="col-md-3">
    <label class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
    @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">Confirmar</label>
    <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
  </div>
</div>

<div class="mt-4">
  <button class="btn btn-primary">Guardar</button>
  <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
