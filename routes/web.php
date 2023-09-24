<?php

use App\Http\Controllers\CarritoUsuarioController;
use App\Http\Controllers\CommenNoticesController;
use App\Http\Controllers\GelatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReservaUsuarioController;
use App\Http\Controllers\RolesController;
use App\Models\Gelatos;
use App\Models\users_roles;
use App\Models\Notices;
use App\Models\personas;
use App\Models\productos;
use App\Models\roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment_notices;

use Illuminate\Support\Facades\DB;
use Vtiful\Kernel\Excel;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('/');

Route::get('/inicial', function () {
    $roles = users_roles::all();
    if (count($roles) < 1) {
        RolesController::inicialCreate();
    }
    return redirect('/');
});

Route::post('/createRole', [RolesController::class, 'create'])->middleware(['auth'])->name('createRole');

Route::get('/gelato', [GelatoController::class, 'index'])->name('gelato');
/*
*/
Route::post('/form_post',function(){
    request()->validate([
        'hola_mundo.*' => 'required|integer|gte:5',
    ]);
    $valuex = request("hola mundo");
    for($i = 0; $i < count($valuex); $i++) {
        $db = $valuex[$i];
        return $db;
    }
})->name("form_post");

Route::get('/get_records', function(){
    $user = Auth::id();
    $form = DB::select("select * from table_other_form where id_user = $user");
    return $form;
});
Route::get("/view_forms", function(){
    return view("User.another_form");
})->name("view_forms");
Route::post("/submit_forms", function(){
    request()->validate([
        "archivos" => "required",
    ]);
    $tipo = $_FILES['archivos']['type'];
    $tamanio = $_FILES['archivos']['size'];
    $archivotmp = $_FILES['archivos']['tmp_name'];
    $lineas = file($archivotmp);
    $i = 0;
    $form = DB::select("select * from table_other_form");
    $user = Auth::id();
    foreach($lineas as $linea){
        if($i != 0){
            $datos = explode(";", $linea);
            $nombre         = !empty($datos[0]) ? ($datos[0]) : '';
            $descripcion    = !empty($datos[1]) ? ($datos[1]) : '';
            $db = [
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "id_user" => $user
            ];
            DB::table("table_other_form")->insert($db);
        } else {
            DB::table("table_other_form")->where('id_user', $user)->delete();
            $datos = explode(";", $linea);
            $nombre         = !empty($datos[0]) ? ($datos[0]) : '';
            $descripcion    = !empty($datos[1]) ? ($datos[1]) : '';
            $db = [
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "id_user" => $user
            ];
            DB::table("table_other_form")->where("nombre", $nombre)->update($db);
        }
        $i++;
    }
    return redirect()->route("view_forms");
})->name("file_submit");

Route::post("/submit_forms2", function(){
    request()->validate([
        "archivos2" => "required",
    ]);
    $archivo = request("archivos2");


})->name("file_submit2");

Route::get('/error_page', function(){
    return view ('components.errors.error_page');
})->name('error_page');

Route::get('/home', function (Request $request) {
    $idRolUser = users_roles::where('id_user', Auth::id())->get();
/*    $productos = DB::table('productos')
                ->select('id', 'nombre', 'tipo_producto', 'precio', 'img')
                ->where('nombre','LIKE', '%'.$search.'%')
                ->orWhere('tipo_producto','LIKE', '%'.$search.'%')
                ->orWhere('precio','LIKE', '%'.$search.'%')
                ->paginate(10);*/
    //return $idRolUser[0]->id_rol;
    if (($idRolUser[0]->id_rol) == 1) {
        return view('Admin.dashboard');
    } else {
        return view('User.dashboard');
    }
})
->middleware("auth")
->name('home');

Route::get('/contactos', [GelatoController::class, 'contacto'])->name('contactos.contacto');
Route::post('/contactos', [GelatoController::class, 'mail_sended'])->name('contactos.mail_sended');

Route::get('/view_all_notices', function (){
    $notices = Notices::all();
    return $notices;
})
->middleware('auth')
->name('view_all_notices');

Route::get('/view_all_notices_guest', function (){
    $notices = comment_notices::all();

    return $notices;
})
->name('view_all_notices_guest');

Route::get('/view_likes/{id}', function ($id){
    $userId = Auth::id();
    $data = comment_notices::where('id_user', $userId)
    ->where('id_notice', $id)
    ->first();
return $data;
})
->name('view_likes');

Route::post('/create_notices', [NoticesController::class, 'create'])
->middleware('auth')
->name('create_notices');

Route::get('/home/{id}', [NoticesController::class, 'readOne'])
->middleware('auth')
->name('view_notice');

Route::post('/notice_updated/{id}', [NoticesController::class, 'update'] )
->middleware('auth')
->name('edit_notice');


Route::post('/notice_deleted/{id}', [NoticesController::class, 'delete'] )
->middleware('auth')
->name('notice_deleted');

// Route::post('/comment_create/{id}', [CommenNoticesController::class, 'postCommentNotice'] )
// ->middleware('auth')
// ->name('comment_create');

// Route::post('/comment_create/{id}', [CommenNoticesController::class, 'postCommentNotice'] )
// ->middleware('auth')
// ->name('comment_create');

Route::get('/fetch-notices', [CommenNoticesController::class, 'getCommentNotice'] )
->name('fetch_notices');

Route::post('/comment_create', [CommenNoticesController::class, 'commentNotice'] )
->middleware('auth')
->name('comment_create');

Route::post('/comment_edit', [CommenNoticesController::class, 'editCommentNotice'] )
->middleware('auth')
->name('comment_edit');


Route::post('/favorite/{id}', [CommenNoticesController::class, 'postFavorite'] )
->middleware('auth')
->name('favorite');

Route::post('/remove_favorite/{id}', [CommenNoticesController::class, 'removeFavorite'] )
->middleware('auth')
->name('remove_favorite');

Route::get('/noticias_gelato', [GelatoController::class, 'noticias'])->name('noticias_gelato');

Route::get('/mi_perfil/{id}', function($id){
    $persona2 = Personas::where('id_user', $id)->get();
    $persona2 = Personas::find(1);

    $user2 = User::find($id);
    $userRol = users_roles::where('id_user', $id)->get();
    $userRol =  ($userRol[0]->id_rol);
    if (!$user2) {
        return redirect('error_page');
    }
    else{
        if ($userRol == 1) {
            return view('Admin.perfil', ['persona' => $persona2]);
        } else {
            return view('User.perfil', ['persona' => $persona2]);
        }

    }

})->middleware('auth')->name('perfil.show');
Route::post('/mi_perfil', [PersonasController::class, 'update'])->middleware('auth')->name('perfil.update');

Route::get('/productos_view', function(){
    $productos = productos::all();
    /*    $productos = DB::table('productos')
                ->select('id', 'nombre', 'tipo_producto', 'precio', 'img')
                ->where('nombre','LIKE', '%'.$search.'%')
                ->orWhere('tipo_producto','LIKE', '%'.$search.'%')
                ->orWhere('precio','LIKE', '%'.$search.'%')
                ->paginate(10);*/
    //return $idRolUser[0]->id_rol;
    return $productos;

})->middleware('auth')->name('productos.view_user');

//                  |
//Permissions admin v
//Productos

Route::get('/productos', [ProductoController::class, 'create'] )->middleware('isAdmin')->name('productos.create');

Route::get('/productos/{id}', [ProductoController::class, 'viewProduct'] )->middleware('isAdmin')->name('productos.view');

Route::post('/productos_updated/{id}', [ProductoController::class, 'update'] )->middleware('isAdmin')->name('productos.edit');

Route::post('/productos_deleted/{id}', [ProductoController::class, 'delete'] )->middleware('isAdmin')->name('productos.deleted');

Route::post('/productos', [ProductoController::class, 'save'] )->middleware('isAdmin')->name('productos.saved');


//Route::get('/getProductos', [ProductosController::class, 'getProductos'])->middleware(['auth'])->name('getProductos');
Route::get('/productosCarrito', [CarritoUsuarioController::class, 'getProductosCarrito'])->middleware(['auth'])->name('productosCarrito');
Route::post('/addproductosCarrito', [CarritoUsuarioController::class, 'postProductosCarrito'])->middleware(['auth'])->name('addproductosCarrito');

Route::get('/reserva', [ReservaUsuarioController::class, 'reservasUser'])->middleware(['auth'])->name('reserva');
Route::post('/newReserva', [ReservaUsuarioController::class, 'newReserva'])->middleware(['auth'])->name('newReserva');


Route::get('/gelato/{id}', [GelatoController::class, 'show'])->name('getGelato');


Route::get('/hola_mundo', function(){
    $notice = DB::table('notices')
    ->leftJoin('comment_notices', 'comment_notices.id_notice', '=', 'notices.id')
    ->select('notices.id','comment_notices.message as message','comment_notices.favorite as favorite',
    'comment_notices.id_users as user','comment_notices.id_notice as notice','notices.titulo as titulo',
    'notices.mensaje as mensaje', 'notices.archivos as archivos')
    ->groupBy('comment_notices.id')
    ->get();

    return $notice;
})->name('hola_mundo');

require __DIR__ . '/auth.php';
