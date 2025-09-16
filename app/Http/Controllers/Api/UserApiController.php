<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserApiController extends Controller
{
    public function index() { return User::orderBy('id','desc')->paginate(10); }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['name'] = trim($data['nombre'].' '.$data['apellido']);
        if (empty($data['password'])) unset($data['password']); //  cast 'hashed'
        $u = User::create($data);
        return response()->json($u, 201);
    }

    public function show(User $user) { return $user; }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['name'] = trim($data['nombre'].' '.$data['apellido']);
        if (empty($data['password'])) unset($data['password']);
        $user->update($data);
        return $user->fresh();
    }

    public function destroy(User $user) { $user->delete(); return response()->noContent(); }
}
