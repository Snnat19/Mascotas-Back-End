<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [ 
        'nombre',
        'documento',
        'email',
        'telefono',
        'nom_mascota',
        'especie',
        'raza',
        'color',
        'ubicacion',
        'fecha',
    ];
}
