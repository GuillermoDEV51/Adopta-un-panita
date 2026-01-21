<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
        'nombre',
        'id_especie',
        'id_refugio',
        'edad',
        'genero',
        'estado',
        'tamano',
        'descripcion',
        'documentacion',
        'foto',
        'raza',
        'peso',
    ];


    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        return parent::hasMany($related, $foreignKey, $localKey);
    }
     public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
