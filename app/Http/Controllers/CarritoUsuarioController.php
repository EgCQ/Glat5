<?php

namespace App\Http\Controllers;

use App\Models\carrito_usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoUsuarioController extends Controller
{
    public function getProductosCarrito()
    {
        $userId = Auth::id();
        $data = carrito_usuario::where('id_user', $userId)
            ->where('estado', 'act')
            ->first();
        return $data->productos;
    }

    public function postProductosCarrito(Request $request)
    {
        $userId = Auth::id();
        $carritoAct = carrito_usuario::where('id_user', $userId)->where('estado', 'act')->first();
        if (empty($carritoAct)) {
            $data = carrito_usuario::create([
                'productos' => json_encode(request('productos')),
                'estado' => 'act',
                'id_user' => $userId,
            ]);
        } else {
            $data = $carritoAct->update([
                'productos' => json_encode(request('productos'))
            ]);
        }
        return $data;
    }
}
