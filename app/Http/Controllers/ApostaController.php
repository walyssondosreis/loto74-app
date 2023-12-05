<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotoRequest;
use App\Models\Jogo;
use App\Models\Aposta;
use App\Models\Numero;
use App\Models\Concurso;

use function App\Helpers\myHelperFunction;

class ApostaController extends Controller
{
    public function conferidor(LotoRequest $request)
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

        $concursos_completo = Numero::join('resultados', 'resultados.numero_id', '=', 'numeros.id')
            ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
            ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
            ->orderBy('concursos.id', 'desc');

        // var_dump($concursos_completo->toArray());
        // var_dump($jogo->toArray());

        $filtros = [];

        if ($request->has('_token') || session('inputConferidor')) {

            $dadosForm = [];
            if (session('inputConferidor')) {
                $dadosForm = session('inputConferidor');
            }
            if ($request->has('_token')) {
                // $dadosForm = $request->except(['_token','page']);
                $dadosForm = $request->except(['_token', 'page']);
                $request->session()->put('inputConferidor', $request->except(['_token', 'page']));
            }

             // Entrada de Concursos Tratamento

             if (strpos($dadosForm['concursos'], '-') && $dadosForm['concursos']) {
                $ccn = explode('-', $dadosForm['concursos']);
                sort($ccn);
                $concursos_completo->whereBetween('concursos.id', $ccn);
            } else if ($dadosForm['concursos']) {
                $ccn = explode(',', $dadosForm['concursos']);
                sort($ccn);
                $concursos_completo->whereIn('concursos.id', $ccn);
            }

            // Entrada de Sequencias Tratamento

            if ($dadosForm['sequencias']) {
                $seqs = explode(',', $dadosForm['sequencias']);
                foreach ($seqs as $ch => $seq) {
                    $seqs[$ch] = implode(',', str_split($seq));
                }

                $concursos_completo->whereIn('numeros.sequencia', $seqs);
            }
            // Entrada de Data Inicio e Data Fim Tratamento
            if ($dadosForm['data_ini'] || $dadosForm['data_fim']) {

                $dadosForm['data_ini'] = $dadosForm['data_ini'] ? $dadosForm['data_ini'] : '2003-09-29';
                $dadosForm['data_fim'] = $dadosForm['data_fim'] ? $dadosForm['data_fim'] : now()->toDateString();
                $concursos_completo->whereBetween('concursos.data_apuracao', [$dadosForm['data_ini'], $dadosForm['data_fim']]);
            }

            var_dump($dadosForm);
            $filtros = $dadosForm;


        }

        $concursos_completo = $concursos_completo->get();

        $aposta = new Aposta();
        // $aposta2 = new Aposta(['jogo_id'=>1,'concurso_id'=>256]);
        // var_dump($aposta2->conferir());
        // $res = $aposta->conferir([$jogo,$numero1,$numero2,$numero3,$numero4],$concursos_completo->toArray());
        $cards = $aposta->conferir([$numero4,$numero1],$concursos_completo->toArray());
        var_dump($cards);

        $ranking = [];
        $premiado = [];
        $npremiado = [];
        $analisador = [];

        foreach($cards as $idx=>$card){

            // Cacula pontuação total de jogos passados
            $ranking[$idx] = 0;
            foreach($card['stats'] as $ids=>$cs) {
                $ranking[$idx] += $ids*$cs;
            }

            // var_dump($card['stats']);
            $npreal = array_sum(array_slice($card['stats'],0,6));
            $preal = array_sum(array_slice($card['stats'],6));
            var_dump($preal);
            var_dump($npreal);

            if(intval($npreal+$preal) !== 0) {
                $npremiado[$idx] = number_format(($npreal/($preal+$npreal))*100,0);
                $premiado[$idx] = number_format(($preal/($preal+$npreal))*100,0);
            }else{
                $npremiado[$idx] = 0;
                $premiado[$idx] = 0;
            }


            // Logica que retorna array com quantidades de repetições de numeros
            $qtdNums = array_fill(0, 25, 0);
            foreach ($card['output'] as $ccc) {

                // var_dump($ccc);
                foreach (explode(',', $ccc['numeros']) as $n) {
                    $qtdNums[$n - 1] += 1;
                }
                $analisador[$idx] = $qtdNums;
            }

        }
        // var_dump($numero1->toArray());
        // var_dump($numero4->toArray());
        // var_dump($concursos_completo->toArray());

        arsort($ranking);
        // var_dump($ranking);



        $toView = [
            // Cards
            'cards'=>$cards,
            'ranking'=>$ranking,
            'premiado'=> $premiado,
            'npremiado'=>$npremiado,
            'analisador'=>$analisador,
            // Formulário
            'campos' => ['jogos','concursos','sequencias','datas'],
            'submit' => 'conferidor',
            'filtros' => $filtros,
            'nomeFiltro' => 'inputConferidor',
        ];

        return view('conferidor',$toView);
        // $aposta = new Aposta();
        // var_dump($numero->registrar());

    }
}
