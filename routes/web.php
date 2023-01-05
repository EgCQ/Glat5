<?php

use App\Http\Controllers\CarritoUsuarioController;
use App\Http\Controllers\GelatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ProductoController;
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
use Illuminate\Support\Facades\DB;

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

Route::get('/error_page', function(){
    return view ('components.errors.error_page');
})->name('error_page');

Route::get('/home', function (Request $request) {
    $notice = Notices::all();
    $idRolUser = users_roles::where('id_user', Auth::id())->get();
    $search = trim($request->get('search'));
/*    $productos = DB::table('productos')
                ->select('id', 'nombre', 'tipo_producto', 'precio', 'img')
                ->where('nombre','LIKE', '%'.$search.'%')
                ->orWhere('tipo_producto','LIKE', '%'.$search.'%')
                ->orWhere('precio','LIKE', '%'.$search.'%')
                ->paginate(10);*/
    //return $idRolUser[0]->id_rol;
    if (($idRolUser[0]->id_rol) == 1) {
        return view('Admin.dashboard', ['notice' => $notice]);
    } else {
        return view('User.dashboard', compact('search'));
    }
})
->middleware("auth")
->name('home');

Route::get('/contactos', [GelatoController::class, 'contacto'])->name('contactos.contacto');
Route::post('/contactos', [GelatoController::class, 'mail_sended'])->name('contactos.mail_sended');


Route::post('/create_notices', [NoticesController::class, 'create'])
->middleware('auth')
->name('create_notices');

Route::get('/view_notice/{id}', [NoticesController::class, 'readOne'])
->middleware('auth')
->name('view_notice');

Route::post('/notice_updated/{id}', [NoticesController::class, 'update'] )
->middleware('auth')
->name('edit_notice');


Route::post('/notice_deleted/{id}', [NoticesController::class, 'delete'] )
->middleware('auth')
->name('notice_deleted');


Route::get('/noticias_gelato', [GelatoController::class, 'noticias'])->name('noticias_gelato');

Route::get('/mi_perfil/{id}', function($id){
    $user = User::where('id', $id)->get();
    $persona = Personas::where('id_user', $id)->get(['slug']);
    $persona2 = Personas::where('id_user', $id)->get();
    $persona2 = Personas::find(1);
    $user2 = User::find($id);
    if ($user2) {
        return view('Admin.perfil', ['persona' => $persona2]);
    }
    else{
        return redirect('error_page');
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

Route::post('/productos_deleted/{id}', [ProductoController::class, 'delete'] )->middleware('isAdmin')->name('productos.delete');

Route::post('/productos', [ProductoController::class, 'save'] )->middleware('isAdmin')->name('productos.saved');


//Route::get('/getProductos', [ProductosController::class, 'getProductos'])->middleware(['auth'])->name('getProductos');
Route::get('/productosCarrito', [CarritoUsuarioController::class, 'getProductosCarrito'])->middleware(['auth'])->name('productosCarrito');
Route::post('/addproductosCarrito', [CarritoUsuarioController::class, 'postProductosCarrito'])->middleware(['auth'])->name('postProductosCarrito');


Route::get('/gelato/{id}', [GelatoController::class, 'show'])->name('getGelato');

require __DIR__ . '/auth.php';
