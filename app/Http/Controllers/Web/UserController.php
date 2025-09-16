<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['name'] = trim($data['nombre'].' '.$data['apellido']);
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('ok','Usuario creado.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['name'] = trim($data['nombre'].' '.$data['apellido']);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('users.index')->with('ok','Usuario actualizado.');
    }

    public function destroy(User $user)
    {
        // evitar que te borres a ti mismo
        if (auth()->id() === $user->id) {
            return back()->with('error','No puedes eliminar tu propio usuario.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('ok','Usuario eliminado.');
    }
}
