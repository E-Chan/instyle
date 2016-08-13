<?php

namespace Instyle\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Instyle\Models\User;
class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
                'email'     =>  'required|unique:users|email|max:128',
                'username'  =>  'required|unique:users|alpha_dash|max:26',
                'password'  =>  'required|min:6'
        ]);
        User::create([
            'email'     => $request->input('email'),
            'username'  => $request->input('username'),
            'password'  => bcrypt($request->input('password')),
            ]);

        return redirect()->route('home')
        ->with('info', 'Tu cuenta ha sido creada! Puedes ahora iniciar sesión.');
    }

    public function getSignin()
    {
        return view('auth.signin');
    }
    
    public function postSignin(Request $request)
    {
                $this->validate($request, [
                'email'  =>  'required',
                'password'  =>  'required'
        ]);
        
        if (!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
            return redirect()->route('auth.signin')->with('info', 'No se ha encontrado el usuario.');
        }

        return redirect()->route('home')->with('info', 'Has iniciado sesión.');
    }

    public function getSignout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}