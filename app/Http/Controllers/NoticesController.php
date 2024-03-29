<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoticesController extends Controller
{
    protected function create(Request $request){
        request()->validate([
            'archivos' => 'required',
            'titulo' => 'required|string',
            'mensaje' => 'required|string',
        ]);
        $title = request('titulo');

        $img = $request->file('archivos');
        $nombreImagen = Str::slug($title).".".$img->guessExtension();

        $name=time().".".$img->guessExtension();
        $ruta = public_path("img/notices/");
        copy($img->getRealPath(),$ruta.$nombreImagen);
            Notices::create([
                'archivos' => $nombreImagen,

                'titulo' => request('titulo'),
                'mensaje' => request('mensaje'),
            ]);
            
        return redirect('home')->with('success','Noticia publicada');

    }

    protected function store(){
        
    }

    protected function readAll(){
        $notice = notices::all();
        return view('gelato.noticias_gelato', ['notice' => $notice]);
    }
    public static function readOne($id)
    {   
        $notice =  notices::find($id);
        
        return $notice;

    }

    public function update(Request $request, $id){
        request()->validate([
            'archivo' => 'required',
            'titulo2' => 'required|string',
            'mensaje2' => 'required|string',
        ]);

        $notice = notices::find($id);
        $title = request('titulo2');

        $img = $request->file('archivo');
        $nombreImagen = Str::slug($title).".".$img->guessExtension();

        $ruta = public_path("img/notices/");
        copy($img->getRealPath(),$ruta.$nombreImagen);
        $notice->update([
            'archivos' => $nombreImagen,
            'titulo' => request('titulo2'),
            'mensaje' => request('mensaje2'),
        ]);
        
        return redirect('home')->with('success','Noticia editada');
    }
    
    public function liked($id){

        $producto = notices::find($id);
        $producto->update([
            'reacciones' => json_encode(request('mensaje2')),
        ]);
        return redirect('home')->with('success','Noticia eliminada');
    }

    public function delete($id){

        $producto = notices::find($id);
        $producto->delete();
        return redirect('home')->with('success','Noticia eliminada');

    }

}
