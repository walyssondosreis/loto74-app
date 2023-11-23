<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Aposta;
use App\Models\Numero;
use App\Models\Concurso;
use Illuminate\Support\Facades\DB;

class ApostaController extends Controller
{
    public function conferidor(){
        $numero= new Numero('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15');

        $concursos = new Concurso();

        $concursos_completo = DB::table('numeros')
            ->join('resultados', 'resultados.numero_id', '=', 'numeros.id')
            ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
            ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
            ->orderBy('concursos.id', 'desc');
        $concursos_completo = $concursos_completo->get();


        $aposta = new Aposta();
        // $aposta = new Aposta();
        // var_dump($numero->registrar());


    }
}
