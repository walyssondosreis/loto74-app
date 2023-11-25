<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Aposta;
use App\Models\Numero;
use App\Models\Concurso;
use Illuminate\Support\Facades\DB;

class ApostaController extends Controller
{
    public function conferidor()
    {

        $numero1 = new Numero('1,3,4,5,6,8,11,13,14,17,18,19,21,24,25');
        $numero2 = new Numero('1,2,3,5,7,10,11,13,14,17,18,20,22,23,24');
        $numero3 = new Numero(' 3,4,6,7,10,11,13,14,15,17,19,20,22,23,24'); // O Premiado

        $jogo = Jogo::with('numero')->find(1);

        /*
            Há 2 tipos de verificação de aposta;
            Conferência Avulsa => Numero em Aposta: Identificador é composto pelo USERNAME+DATA+HORA
            Conferência Padrão => Jogo em Aposta: Identificador é o ID da Aposta
        */
        $concursos = new Concurso();

        $concursos_completo =
            Numero::join('resultados', 'resultados.numero_id', '=', 'numeros.id')
            ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
            ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
            ->whereIn('concursos.id',[44,46,52])
            ->orderBy('concursos.id', 'desc')->get();

        // var_dump($concursos_completo->toArray());
        // var_dump($jogo->toArray());


        $aposta = new Aposta();
        // $aposta2 = new Aposta(['jogo_id'=>1,'concurso_id'=>256]);
        // var_dump($aposta2->conferir());
        $aposta->conferir([$jogo,$numero1],$concursos_completo->toArray());


        var_dump($aposta);

        // $aposta = new Aposta();
        // var_dump($numero->registrar());

    }
}
