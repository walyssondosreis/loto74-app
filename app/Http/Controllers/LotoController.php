<?php

namespace App\Http\Controllers;

use App\Models\Concurso;
use App\Models\Numero;
use App\Models\Resultado;
use Illuminate\Http\Request;
use App\Services\LotoService;

class LotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dadosView['jogos'] = [$resultadoApi->getResultadoApi(13)];
        // $dadosView['seqs'] = $this->rankearSequencia($dadosView['jogos']);

        // return view('v74', $dadosView);
        $a = Concurso::with('resultado.numero')->find(2908);

        $obj = new LotoService();
   
        var_dump($a->data_apuracao);
        var_dump($a->toArray());
        // var_dump($a->resultado->toArray());
        // var_dump($a->resultado->numero->toArray());
        

    }

    public function rankearSequencia($resultados = [])
    {

        if ($resultados == []) $resultados = $this->resultados;
        $contagem = array();

        foreach ($resultados as $registro) {
            $sqString = implode(',', $registro['sq']);
            if (!isset($contagem[$sqString])) {
                $contagem[$sqString] = 1;
            } else {
                $contagem[$sqString]++;
            }
        }
        arsort($contagem);
        return $contagem;
    }
}
