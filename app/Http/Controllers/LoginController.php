<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function actionLogin(Request $request){
         $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && Auth::user()->id_level == 1) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard-admin');
        }elseif(Auth::attempt($credentials) && Auth::user()->id_level == 2){
            $request->session()->regenerate();
            return redirect()->intended('dashboard-operator');
        }else{
            $request->session()->regenerate();
            return redirect()->intended('dashboard-pimpinan');
        }
        // kalau gagal login
        // Alert::warning('Upsss', 'Invalid Credentials');
        // alert()->warning('Title','Lorem Lorem Lorem');
        return back()->withInput($request->only('email'));
    }
}
