<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
        return redirect()->intended(route('projects.index'));
        }
        return to_route('login')->withErrors([
          'email' => 'email invalide'
        ])->onlyInput('email');
      }
      public function logout(){
          Auth::logout();
          return redirect()->route('login');
      }
}
