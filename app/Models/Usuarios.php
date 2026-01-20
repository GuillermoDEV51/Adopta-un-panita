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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class, 'id_rol');
    }
     public function mascotas()
    {
        return $this->hasMany(Mascotas::class, 'id_usuario');
    }   
}
