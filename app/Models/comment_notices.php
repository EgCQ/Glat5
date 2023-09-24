<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_notices extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'favorite',
        'id_users',
        'id_notice',
    ];
}
