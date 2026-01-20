<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refugios extends Model
{
    protected $table = 'refugios';

    protected $primaryKey = 'id_refugio';

    public $timestamps = false;

    protected $fillable = [
        'nombre_refugio',
        'direccion_refugio',
        'telefono_refugio',
        'email_refugio',
    ];
}
