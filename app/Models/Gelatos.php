<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelatos extends Model
{
    protected $fillable = [
        'foto_perfil',
        'nombre',
        'color',
        'lema',
    ];
}
