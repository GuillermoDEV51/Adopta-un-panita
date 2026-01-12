<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'password',
        'fecha_nacimiento',
        'ubicacion',
        'id_rol',
    ];
}
