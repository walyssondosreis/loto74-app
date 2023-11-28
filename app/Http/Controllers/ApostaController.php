<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use App\Models\Aposta;
use App\Models\Numero;
use App\Models\Concurso;

class ApostaController extends Controller
{
    public function conferidor()
    {

        $numero1 = new Numero('1,3,4,5,6,8,11,13,14,17,18,19,21,24,25');
        $numero3 = new Numero('1,2,3,5,7,10,11,13,14,17,18,20,22,23,24'); // O Premiado
        $numero4 = new Numero('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15');

        // $jogo = Jogo::with('numero')->find(2);

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
            // ->whereIn('concursos.id',[44,46,52])
            ->orderBy('concursos.id', 'desc')->get();

        // var_dump($concursos_completo->toArray());
        // var_dump($jogo->toArray());


        $aposta = new Aposta();
        // $aposta2 = new Aposta(['jogo_id'=>1,'concurso_id'=>256]);
        // var_dump($aposta2->conferir());
        // $res = $aposta->conferir([$jogo,$numero1,$numero2,$numero3,$numero4],$concursos_completo->toArray());
        $cards = $aposta->conferir([$numero4,$numero1,$numero3],$concursos_completo->toArray());

        $ranking = [];
        foreach($cards as $idx=>$card){
            // var_dump($idx);
            // var_dump($card['input']->id ? $card['input']->numero->numeros : $card['input']->numeros);
            // var_dump($card['stats']);
            $subArray = array_slice($card['stats'],6,5);
            $ranking[$idx] = array_sum($subArray);
        }
        arsort($ranking);


        $toView = [
            'cards'=>$cards,
            'ranking'=>$ranking,
        ];

        return view('conferidor',$toView);
        // $aposta = new Aposta();
        // var_dump($numero->registrar());

    }
}
