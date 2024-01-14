<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use function Termwind\render;

class UsuarioController extends Controller
{
    //
    public function login()
    {
        if (Auth::check()) {
            return Inertia::render('Home');
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

        $mensagensPersonalizadas = [
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'password.required' => 'A senha é obrigatória.',
        ];

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],$mensagensPersonalizadas);
        // dd($request->toArray());


        $email = $request->input('email');
        $senha = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $senha], false)) {

            // return redirect()->route('loto')->with('mensagem', 'Bem Vindo de volta!');
            return Inertia::render('Home',['mensagem'=>'Bem Vindo de volta']);
        }


        // return redirect()->route('login')->with('mensagem','Usuário ou senha incorretos');

    }
    public function deslogar()
    {
        Auth::logout();
        return Inertia::render('login');
    }
}
