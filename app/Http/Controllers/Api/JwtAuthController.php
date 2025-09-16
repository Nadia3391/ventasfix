<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JwtAuthController extends Controller
{
    public function login(Request $r)
    {
        $r->validate(['email'=>'required|email','password'=>'required|string']);

        // Guard 'api' usa JWT (config/auth.php)
        if (!$token = Auth::guard('api')->attempt($r->only('email','password'))) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return Auth::guard('api')->user();
    }

    public function logout()
    {
        Auth::guard('api')->logout(); // invalida el token actual
        return response()->json(['message' => 'ok']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    protected function respondWithToken(string $token)
    {
        $ttl = config('jwt.ttl'); // minutos
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'expires_in'   => $ttl * 60, // segundos
        ]);
    }
}
