<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refugios extends Model
{
    protected $table = 'refugios';

    // Standard Laravel primary key is 'id', so we remove the custom one if we want standard behavior.
    // However, if the table migration maintained 'id' (which it does), we don't need to specify primaryKey.
    
    // Enabling timestamps since the table has them
    public $timestamps = true; 

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'descripcion',
        'user_id',
        'redes_sociales',
        'imagen',
    ];

    /**
     * Obtiene el usuario asociado al refugio.
     */
    public function user()
    {
        return $this->belongsTo(Usuarios::class, 'user_id');
    }

    /**
     * Obtiene las mascotas asociadas al refugio.
     */
    public function mascotas()
    {
        return $this->hasMany(Mascotas::class, 'id_refugio');
    }
}
