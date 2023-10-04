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
        // echo 'chupa minha pica então seu vagabundo';
        
        // $dadosView['jogos'] = [$resultadoApi->getResultadoApi(13)];
        // $dadosView['seqs'] = $this->rankearSequencia($dadosView['jogos']);

        // return view('v74', $dadosView);
        $a = Concurso::find(2);
        // $n = new Numero();

    //    $dados = $n->registrar('1,2,3,4,5,6,7,8,9,10,11,12,13,14,17');
    //    $x = $a->getConcursoViaApi();
    $obj = new LotoService();
    $obj2 = new Resultado();
    // $a = $obj->carregarDBViaCSV();
    // $a = $obj->carregarDBViaApi();
    // var_dump($a->data_apuracao);      
    // dd($a->resultado->numero->numeros);
    dd($obj2->registrar(2103));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
