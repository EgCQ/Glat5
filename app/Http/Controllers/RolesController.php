<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\roles;

class RolesController extends Controller
{
    protected function create()
    {
        roles::create([
            'funcion' => request('funcion'),
        ]);
        return redirect('dashboard');
    }
    public static function inicialCreate()
    {
        roles::create([
            'funcion' => 'ADMIN',
        ]);
        roles::create([
            'funcion' => 'USER',
        ]);
    }
}
