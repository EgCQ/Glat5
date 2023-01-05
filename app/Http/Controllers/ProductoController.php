<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function create(){
        $productos = productos::all();
        return view('Admin.productos', ['productos' => $productos]);
    }
    
    public function save(Request $request){
        request()->validate([
            'nombre' => 'required',
            'tipo_producto' => 'required',
            'precio' => 'required',
            'img' => 'required',

        ]);
        $nombre = $request->nombre;
        $tipo_producto = $request->tipo_producto;
        $precio = $request->precio;
        $img = $request->file('img');
        for ($i=0; $i < count($nombre) ; $i++ ) { 
            $nombreImagen = Str::slug($nombre[$i]).".".$img[$i]->guessExtension();
            /*$name=time().".".$img->guessExtension();*/
            $ruta = public_path("img/post/products/");
            copy($img[$i]->getRealPath(),$ruta.$nombreImagen);
            $db = [
                'nombre' => $nombre[$i],
                'tipo_producto' => $tipo_producto[$i],
                'precio' => $precio[$i],
                'img' => $nombreImagen[$i],
            ];
            DB::table('productos')->insert($db);
        }
        return redirect('/productos')->with('success','Producto creado');

    }

    public static function viewProduct($id)
    {
        $productos =  productos::find($id);
        return view('Admin.edit_productos', ['productos' => $productos]);
    }


    public function update(Request $request,$id){
        request()->validate([
            'nombre' => 'required',
            'tipo_producto' => 'required',
            'precio' => 'required',
            'img' => 'required',
        ]);

        $productos = productos::find($id);
        $nombre = $request->nombre;
        $img = $request->file('img');
        $nombreImagen = Str::slug($nombre).".".$img->guessExtension();
        $ruta = public_path("img/post/products/");
        copy($img->getRealPath(),$ruta.$nombreImagen);
        $productos->update([
            'nombre' => request('nombre'),
            'tipo_producto' => request('tipo_producto'),
            'precio' => request('precio'),
            'img' => $nombreImagen,

        ]);
        return redirect('/productos')->with('success','Producto editado');
    }

    public function delete($id){

        $producto = productos::find($id);
        $producto->delete();
        return redirect('/productos')->with('success','Producto eliminado');

    }
}
