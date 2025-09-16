<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Mass assignable
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rut',
        'nombre',
        'apellido',
    ];

    /**
     * Hidden for serialization
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // puedes omitir Hash::make en controladores si usas esto
        ];
    }

    /**
     * JWTSubject: id que irá en el token
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * JWTSubject: claims extra (vacío por ahora)
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * Normaliza email a minúsculas
     */
    public function setEmailAttribute($value): void
    {
        $this->attributes['email'] = strtolower($value);
    }
}
