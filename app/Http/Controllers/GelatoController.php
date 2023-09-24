<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Mail\MessageReceived;
use App\Models\formcontactos;
use Illuminate\Http\Request;
use App\Models\Gelatos;
use App\Models\gelatos_roles;
use App\Models\Notices;
use App\Models\comment_notices;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GelatoController extends Controller
{
    public function index(){

        $gelato = gelatos::all();

        return view('gelato.gelato_readall', ['gelato' => $gelato]);

    }

    public function create(){

        return view ('auth.register_gelato');

    }

    public function login(){

        return view ('auth.login');

    }
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/home');
    }

    public function save(Request $request){
        request()->validate([
            'foto_perfil' => 'required|image',
            'nombre' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'lema' => 'required|string|max:255',
        ], [
            //'url_img.required' => 'Debe agregar una imagen',
            'required' => ':attribute es requerido',
            'string' => ':attribute debe ser texto',
            'max' => ':attribute debe tener maximo 255 caracteres',
            'img_file.image' => 'Debe ser una imagen',
            'img_file.required' => 'Debe agregar una imagen',
        ]);
        if($request->hasFile('foto_perfil')){
            $img = $request->file('foto_perfil');
            $nombreImagen = Str::slug($request->color).".".$img->guessExtension();
            $ruta = public_path("img/post/");
            //$img->move($ruta,$nombreImagen);
            copy($img->getRealPath(),$ruta.$nombreImagen);
            $imagen = $nombreImagen;
        }

        $gelato = gelatos::create([
            'foto_perfil' => $imagen,
            'nombre' => request('nombre'),
            'color' => request('color'),
            'lema' => request('lema'),
        ]);
        event(new Registered($gelato));
        GelatosRolesController::create($gelato);
        return redirect('/login');
    }

    public function show($id){

        $gelato = gelatos::find($id);
        return view('gelato.gelato_read', ['gelato' => $gelato]);

    }

    public function contacto(){

        return view('gelato.gelato_contactos');

    }

    public function mail_sended(Request $request){
        request()->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'mensaje' => 'required',
        ]);
        $correo = new MessageReceived($request->all());
        Mail::to('ernesto-cordovaqui@hotmail.com')->send($correo);
        formcontactos::create([
            'nombre' => request('nombre'),
            'correo' => request('correo'),
            'mensaje' => request('mensaje'),
        ]);
        return redirect()->route('contactos.contacto')->with('success','Correo enviado');
    }

    public function noticias(){
        $userId = Auth::id();

        $notice = DB::table('notices')
        ->leftJoin('comment_notices', 'comment_notices.id_notice', '=', 'notices.id')
        ->select('notices.id as notice','comment_notices.message as message','comment_notices.favorite as favorite',
        'comment_notices.id_users as user','comment_notices.id_notice as comment_notice','notices.titulo as titulo',
        'notices.mensaje as mensaje', 'notices.archivos as archivos')

        ->groupBy("notices.id
")
        ->get();
        // SELECT id_notice, id_users, message, favorite, COUNT(id_notice) FROM `comment_notices` WHERE id_users = 1 GROUP BY id_notice;
        return view('gelato.noticias_gelato', ['notice' => $notice]);
        // return $notice;

    }

}
