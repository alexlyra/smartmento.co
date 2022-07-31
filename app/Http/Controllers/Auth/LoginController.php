<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
    public function index () {
        return view('auth.login');
    }

    public function login (LoginRequest $request) {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['E-mail não encontrado em nossos registros!']);
        }

        if (!Hash::check($request->password, $user->password) || !$user->active) {
            return back()->withErrors('E-mail ou senha inválido!');
        }

        $auth = Auth::attempt($request->validated());

        if (!Auth::check()) {
            return back()->withErrors('Não foi possível autenticar o usuário!');
        }

        return redirect()->route('index');
    }

    public function logout () {
        if (Auth::check()) {
            Auth::logout(); 
        }
        return redirect()->route('index');
    }
}
