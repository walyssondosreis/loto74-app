<?php

namespace App\Http\Controllers;

use App\Models\Concurso;
use App\Models\Numero;
use App\Models\Resultado;
use Illuminate\Http\Request;
use App\Services\LotoService;
use Illuminate\Support\Facades\DB;

class LotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $a = Concurso::with('resultado.numero')->find(2808);
        // $concursos = Concurso::with('resultado.numero')->orderBy('id','desc')->simplePaginate(6);
        $concursos = Concurso::with('resultado.numero')->orderBy('id','desc')->simplePaginate(6);
        // $concursos = Concurso::paginate(10);
        $sequencias = Resultado::with('numero')
        ->select('sequencia', DB::raw('count(*) as qtd'))
        ->groupBy('sequencia')
        ->get();


        // $atualizador = new LotoService();
        // var_dump($atualizador->carregarDBViaApi());
        // var_dump($a->data_apuracao);
        // var_dump($concursos);
        // var_dump($a->resultado->toArray());
        // var_dump($a->resultado->numero->toArray());
        
        return view('loto',['concursos'=>$concursos]);
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
