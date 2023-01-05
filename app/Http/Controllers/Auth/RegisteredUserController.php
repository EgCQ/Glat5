<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\UsersRolesController;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $name = request('name');
        $user = User::create([
               'name' => request('name'),
                'email' => request('email'),
                'password' => request('password'),
                'slug' => Str::slug($name, '-'),
            ]);
        auth()->login($user);
        PersonasController::inicialCreate($user);
        UsersRolesController::create($user);
        return redirect(RouteServiceProvider::HOME);

    }
}
