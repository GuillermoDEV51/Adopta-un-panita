<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Mascotas;

class Especie extends Model
{
    protected $table = 'especies';

    protected $primaryKey = 'id_especie';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

      public function mascotas(): HasMany
    {
        return $this->hasMany(Mascotas::class, 'id_especies', 'id_especie');
    }
}
