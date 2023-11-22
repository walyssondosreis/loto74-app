<?php

namespace App\Http\Controllers;

use App\Models\Aposta;
use App\Models\Numero;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function conferidor(){
        $numero= new Numero('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15');
        // $aposta = new Aposta();
        // var_dump($numero->registrar());

        var_dump($numero->toArray());
        // var_dump($aposta->numero->toArray());
        // $aposta = new Aposta();

        $concursoAlvo = '2957';

    }
}
