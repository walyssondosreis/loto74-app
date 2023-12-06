<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotoRequest;
use App\Models\Jogo;
use App\Models\Aposta;
use App\Models\Numero;
use App\Models\Concurso;
use Exception;

use function App\Helpers\limparFiltros;
use function App\Helpers\myHelperFunction;

class ApostaController extends Controller
{
    public function conferidor(LotoRequest $request)
    {

        /*
            Há 2 tipos de verificação de aposta;
            Conferência Avulsa => Numero em Aposta: Identificador é composto pelo USERNAME+DATA+HORA+RANDOM
            Conferência Padrão => Jogo em Aposta: Identificador é o ID da Aposta
        */

        $concursos_completo = Numero::join('resultados', 'resultados.numero_id', '=', 'numeros.id')
            ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
            ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
            ->orderBy('concursos.id', 'desc');

        // var_dump($concursos_completo->toArray());
        // var_dump($jogo->toArray());
        $numerosConferir = [];
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
            // dd($dadosForm['jogos']);
            // Entrada de Numeros e Jogos Tratamento

            if (strpos($dadosForm['jogos'], ',') && $dadosForm['jogos']) {
                $numjogos = explode(',', $dadosForm['jogos']);
                foreach ($numjogos as $num) {
                    $num = str_replace('-', ',', trim($num));
                    if (strpos($num, ',')) {
                        try {
                            array_push($numerosConferir, new Numero($num));
                        } catch (Exception $e) {
                            limparFiltros('inputConferidor');
                            return redirect()->route('conferidor')->with('mensagem', $e->getMessage());
                        }
                    } else {
                        $jogoBusco = Jogo::with('numero')->find($num);
                        if ($jogoBusco) array_push($numerosConferir, $jogoBusco);
                    }
                }
            } else if ($dadosForm['jogos']) {
                $num = trim($dadosForm['jogos']);
                if (strpos($num, '-')) {
                    try {
                        $num = str_replace('-', ',', trim($num));
                        array_push($numerosConferir, new Numero($num));
                    } catch (Exception $e) {
                        limparFiltros('inputConferidor');
                        return redirect()->route('conferidor')->with('mensagem', $e->getMessage());
                    }
                } else {
                    $jogoBusco = Jogo::with('numero')->find($num);
                    if ($jogoBusco) array_push($numerosConferir, $jogoBusco);
                }
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

            // var_dump($dadosForm);
            $filtros = $dadosForm;
        }

        $concursos_completo = $concursos_completo->get();

        $aposta = new Aposta();
        // $aposta2 = new Aposta(['jogo_id'=>1,'concurso_id'=>256]);
        // var_dump($aposta2->conferir());
        // $res = $aposta->conferir([$jogo,$numero1,$numero2,$numero3,$numero4],$concursos_completo->toArray());
        // $cards = $aposta->conferir([$numero4,$numero1],$concursos_completo->toArray());
        // var_dump($numerosConferir);
        if (!empty($numerosConferir)) {
            $cards = $aposta->conferir($numerosConferir, $concursos_completo->toArray());
        } else {
            $cards = [];
        }
        // var_dump($cards);

        $ranking = [];
        $premiado = [];
        $npremiado = [];
        $analisador = [];

        foreach ($cards as $idx => $card) {

            // Cacula pontuação total de jogos passados
            $ranking[$idx] = 0;
            foreach ($card['stats'] as $ids => $cs) {
                $ranking[$idx] += $ids * $cs;
            }

            // var_dump($card['stats']);
            $npreal = array_sum(array_slice($card['stats'], 0, 6));
            $preal = array_sum(array_slice($card['stats'], 6));
            // var_dump($preal);
            // var_dump($npreal);

            if (intval($npreal + $preal) !== 0) {
                $npremiado[$idx] = number_format(($npreal / ($preal + $npreal)) * 100, 0);
                $premiado[$idx] = number_format(($preal / ($preal + $npreal)) * 100, 0);
            } else {
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
            'cards' => $cards,
            'ranking' => $ranking,
            'premiado' => $premiado,
            'npremiado' => $npremiado,
            'analisador' => $analisador,
            // Formulário
            'campos' => ['jogos', 'concursos', 'sequencias', 'datas'],
            'submit' => 'conferidor',
            'filtros' => $filtros,
            'nomeFiltro' => 'inputConferidor',
        ];

        return view('conferidor', $toView);
        // $aposta = new Aposta();
        // var_dump($numero->registrar());

    }
}
