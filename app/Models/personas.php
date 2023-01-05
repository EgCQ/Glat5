<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class personas extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'telefono',
        'correo',
        'slug',
        'fecha_nacimiento',
        'id_user',
    ];
}
