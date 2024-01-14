<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsuarioController extends Controller
{
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

}
