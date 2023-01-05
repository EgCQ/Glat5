<?php

namespace App\Http\Controllers;

use App\Models\gelatos_roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\roles;

class GelatosRolesController extends Controller
{
    public static function create($gelato)
    {
        $roles = roles::find(2);
        gelatos_roles::create([
            'id_gelato' => $gelato['id'],
            'id_rol' => $roles['id'],
        ]);
    }
}
