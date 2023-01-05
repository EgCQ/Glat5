<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users_roles;
use App\Models\roles;

class UsersRolesController extends Controller
{
    public static function create($user)
    {
        $roles = roles::find(2);
        users_roles::create([
            'id_user' => $user['id'],
            'id_rol' => $roles['id'],
        ]);
    }
}
