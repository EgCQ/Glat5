<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\reserva_usuario;
use App\Models\carrito_usuario;
use App\Models\personas;
use App\Models\users_roles;
use Illuminate\Support\Facades\DB;

class ReservaUsuarioController extends Controller
{
    public function reservasUser()
    {
        return view('User.pedidos');
    }

    public function newReserva()
    {
        if (empty(request('productos'))) {
            return null;
        }
        $userId = Auth::id();
        $personas = personas::find($userId);
        if (empty($personas->telefono)) {
            return $personas;
        }
        $data = reserva_usuario::create([
            'productos' => json_encode(request('productos')),
            'estado' => 'en proceso',
            'id_user' => $userId,
        ]);
        $carritoAct = carrito_usuario::where('id_user', $userId)->where('estado', 'act')->first();
        $data = $carritoAct->update([
            'estado' => 'ord'
        ]);
        return $data;
    }

    public function verReservas()
    {
        return view('Admin.pedidos');
    }


    protected function create()
    {
        reserva_usuario::create([
            'productos' => request('productos'),
            'id_estado' => request('id_estado'),
            'id_user' => request('id_user')
        ]);
    }

    protected function readOne($id)
    {
        //$reservas = reservaUsuario::all();
        $reserva = DB::table('reserva_usuario')
            ->join('personas', 'personas.id_user', '=', 'reserva_usuarios.id_user')
            ->join('estados', 'reserva_usuarios.id_estado', '=', 'estados.id_estado')
            ->select('reserva_usuarios.*', 'personas.nombres', 'personas.apellidos')
            ->where('id_reserva', $id)
            ->get();
        return view('Admin.pedidos_actualizar', ['reserva' => $reserva]);
    }

    protected function readAll()
    {
        $data = DB::table('reserva_usuarios')
            ->join('personas', 'personas.id', '=', 'reserva_usuarios.id_user')
            ->select('reserva_usuarios.*', 'personas.nombres', 'personas.apellidos', 'personas.telefono', 'personas.correo')
            ->where('reserva_usuarios.estado', '=', 'en proceso')
            ->get();
        return $data;
    }
    protected function readAllEntregados()
    {
        $data = DB::table('reserva_usuarios')
        ->join('personas', 'personas.id', '=', 'reserva_usuarios.id_user')
        ->select('reserva_usuarios.*', 'personas.nombres', 'personas.apellidos', 'personas.telefono', 'personas.correo')
        ->where('reserva_usuarios.estado', '=', 'entregado')
        ->get();
        return $data;
    }

    public function getEntregados()
    {
        return view('Admin.entregados');
    }


    public static function viewReserva($id)
    {
        $userRol = users_roles::where('id_user', $id)->get();
        $userRol =  $userRol[0]->id_rol;
        //$persona =  personas::find($id);
        //if ($userRol == 1) {
        //    return view('Admin.perfil', ['persona' => $persona]);
        //} else {
        //    return view('User.perfil', ['persona' => $persona]);
        //}
    }

    protected function update()
    {
        $data = reserva_usuario::find(request('productos.id'));
        $data->update([
            'estado' => 'entregado',
        ]);
        return $data;
    }

    protected function delete()
    {
        $reservaUsuario = reserva_usuario::find('id_reserva', request('id_reserva'));
        $reservaUsuario->delete();
        //return  redirect('home');
    }
}
