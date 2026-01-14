<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'name'
    ];


    public $timestamps = false;

    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'id_rol');
    }
}
