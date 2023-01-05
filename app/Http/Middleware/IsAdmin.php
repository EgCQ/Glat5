<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users_roles;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $idRolUser = users_roles::where('id_user', Auth::id())->get();

        if (($idRolUser[0]->id_rol) == 1):
            return $next($request);

        endif;
            return redirect('home');
    }
}