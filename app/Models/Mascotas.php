<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = 'mascotas';

    protected $fillable = [
        'nombre',
        'id_especies',
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
        'vacunado',
        'esterilizado',
    ];

    protected $casts = [
    'vacunado' => 'boolean',
    'esterilizado' => 'boolean',
];

     public function especie()
    {
        return $this->belongsTo(Especie::class, 'id_especies');
    }

    public function hasMany($related, $foreignKey = null, $localKey = null)
    {
        return parent::hasMany($related, $foreignKey, $localKey);
    }
     public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
