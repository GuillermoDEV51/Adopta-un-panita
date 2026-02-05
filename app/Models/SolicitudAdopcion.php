<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudAdopcion extends Model
{
    protected $fillable = ['user_id', 'mascota_id', 'estado', 'mensaje'];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'user_id');
    }

    public function mascota()
    {
        return $this->belongsTo(Mascotas::class, 'mascota_id');
    }
}
