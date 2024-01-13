<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('loto');
        }

        // return view('login');
        return Inertia::render('Login');
    }
    public function criar_usuario()
    {
        $user =  new User();
        $user->name = 'Walysson dos Reis';
        $user->username = 'walyssondosreis';
        $user->email = 'walyssondosreis@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
        echo 'Usuario criado com sucesso!';
    }

    public function logar(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // dd($request->toArray());


        $email = $request->input('email');
        $senha = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $senha], false)) {

            return redirect()->route('loto')->with('mensagem', 'Bem Vindo de volta!');
        }


        // return redirect()->route('login')->with('mensagem','Usuário ou senha incorretos');

    }
    public function deslogar()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
