<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'password',
        'fecha_nacimiento',
        'telefono',
        'ubicacion',
        'id_rol',
        'estado_verificacion',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Obtiene el rol del usuario.
     */
    public function role()
    {
        return $this->belongsTo(Roles::class, 'id_rol');
    }

    /**
     * Obtiene las mascotas publicadas por el usuario.
     */
     public function mascotas()
    {
        return $this->hasMany(Mascotas::class, 'id_usuario');
    }   
}
