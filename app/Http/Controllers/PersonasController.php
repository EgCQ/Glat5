<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\personas;
use App\Models\users_roles;
use Illuminate\Support\Str;

class PersonasController extends Controller
{
    public static function inicialCreate($user)
    {
        personas::create([
            'nombres' => $user['name'],
            'correo' => $user['email'],
            'slug' => Str::slug($user['name'], '-'),
            'id_user' => $user['id'],
        ]);
    }

    public static function viewPersona($id)
    {
        $userRol = users_roles::where('id_user', $id)->get();
        $userRol =  ($userRol[0]->id_rol);
        $persona =  personas::find($id);
        if ($userRol == 1) {
            return view('Admin.perfil', ['persona' => $persona]);
        } else {
            return view('User.perfil', ['persona' => $persona]);
        }
    }

    public static function update()
    {
        
        $persona = personas::find(request('id'));
        $persona->update([
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),
            'cedula' => request('cedula'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'fecha_nacimiento' => request('fecha_nacimiento')
        ]);

        return redirect('mi_perfil/' . $persona->id)->with('success','Perfil actualizado!');
    }
}