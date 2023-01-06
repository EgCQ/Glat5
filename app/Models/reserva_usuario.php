<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva_usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'productos',
        'estado',
        'id_user',
    ];
}
