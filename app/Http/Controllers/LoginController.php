<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

   public function validalogin(Request $request){
        $credenciales =  $request->validate([
            'name'      => ['required', 'string'],
            'password'  => ['required', 'string']
        ]);
        
        $usuario = $request['name'];
        session()->put('operador', $usuario);
        $remember = $request->filled('remember');

        if (Auth::attempt($credenciales, $remember))
        {
            $request->session()->regenerate();
            return redirect('inicio')->with('status', 'Sesion iniciada');
        }
        throw ValidationException::withMessages([
            'name' => __('auth.failed')
        ]);

    }

    public function  logout(Request $request)
    {
       Auth::logout();

       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return Redirect::to('/');
   }
}
