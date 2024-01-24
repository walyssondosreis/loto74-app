<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jogo;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Numero;
use App\Models\Concurso;
use App\Services\LotoService;
use App\Http\Requests\LotoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $filtros = Request::all();

        // var_dump($filtros);


        $concursos = Numero::join('resultados', 'resultados.numero_id', '=', 'numeros.id')
            ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
            ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
            ->filter(Request::only('concursos'))
            ->orderBy('concursos.id', 'desc')
            ->paginate(6)
            ->withQueryString()
            ->through(fn ($concurso) => [
                'id' => $concurso->cc,
                'dataApuracao' => Carbon::createFromFormat('Y-m-d', $concurso->data_apuracao)->format('d/m/Y'),
                'numeros' => explode(',',$concurso->numeros) ,
                'sequencia' => explode(',',$concurso->sequencia) ,
            ]);
        // dd($concursos);
        // 'filters' => Request::all('search', 'trashed'),

        // var_dump($filtros);

        return Inertia::render('Lotofacil/Lotofacil',[
            'filters'=>$filtros,
            'concursos'=>$concursos
        ]);

        // // Busca concursos completo na tabela com paginação
        // $concursos = Concurso::with('resultado.numero')
        //     ->orderBy('concursos.id', 'desc');

        //     // Busca completo de concursos
        // $concursos_completo = Numero::join('resultados', 'resultados.numero_id', '=', 'numeros.id')
        //     ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
        //     ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
        //     ->orderBy('concursos.id', 'desc');
        // $filtros = [];

        // if ($request->has('_token') || session('inputLoto')) {


        //     if (session('inputLoto')) {
        //         $dadosForm = session('inputLoto');
        //     }
        //     if ($request->has('_token')) {
        //         // $dadosForm = $request->except(['_token','page']);
        //         $dadosForm = $request->except(['_token', 'page']);
        //         $request->session()->put('inputLoto', $request->except(['_token', 'page']));
        //     }

        //     // Entrada de Concursos Tratamento

        //     if (strpos($dadosForm['concursos'], '-') && $dadosForm['concursos']) {
        //         $ccn = explode('-', $dadosForm['concursos']);
        //         sort($ccn);
        //         $concursos->whereBetween('concursos.id', $ccn);
        //         $concursos_completo->whereBetween('concursos.id', $ccn);
        //     } else if ($dadosForm['concursos']) {
        //         $ccn = explode(',', $dadosForm['concursos']);
        //         sort($ccn);
        //         $concursos->whereIn('concursos.id', $ccn);
        //         $concursos_completo->whereIn('concursos.id', $ccn);
        //     }

        //     // Entrada de Sequencias Tratamento

        //     if ($dadosForm['sequencias']) {
        //         $seqs = explode(',', $dadosForm['sequencias']);
        //         foreach ($seqs as $ch => $seq) {
        //             $seqs[$ch] = implode(',', str_split($seq));
        //         }

        //         $concursos->whereHas('resultado.numero', function ($query) use ($seqs) {
        //             $query->whereIn('numeros.sequencia', $seqs);
        //         });
        //         $concursos_completo->whereIn('numeros.sequencia', $seqs);
        //     }
        //     // Entrada de Data Inicio e Data Fim Tratamento
        //     if ($dadosForm['data_ini'] || $dadosForm['data_fim']) {

        //         $dadosForm['data_ini'] = $dadosForm['data_ini'] ? $dadosForm['data_ini'] : '2003-09-29';
        //         $dadosForm['data_fim'] = $dadosForm['data_fim'] ? $dadosForm['data_fim'] : now()->toDateString();
        //         $concursos->whereBetween('concursos.data_apuracao', [$dadosForm['data_ini'], $dadosForm['data_fim']]);
        //         $concursos_completo->whereBetween('concursos.data_apuracao', [$dadosForm['data_ini'], $dadosForm['data_fim']]);
        //     }
        //     $filtros = $dadosForm;
        // }

        // $concursos = $concursos->paginate(6);
        // $concursos_completo = $concursos_completo->get();
        // $sequencias = [];
        // $aux_1 = [];
        // $numeros = array_fill(0, 25, 0);
        // $aux_2 = [];

        // foreach ($concursos_completo as $ccc) {
        //     if (!in_array($ccc->sequencia, $aux_1)) {
        //         array_push($aux_1, $ccc->sequencia);
        //         $sequencias[$ccc->sequencia]['sequencia'] = $ccc->sequencia;
        //         $sequencias[$ccc->sequencia]['qtd'] = 1;
        //     } else {
        //         $sequencias[$ccc->sequencia]['qtd'] += 1;
        //     }
        //     foreach (explode(',', $ccc->numeros) as $n) {
        //         $numeros[$n - 1] += 1;
        //     }
        // }
        // usort($sequencias, function ($a, $b) {
        //     return $b['qtd'] - $a['qtd'];
        // });

        // $toView = [
        //     'concursos' => $concursos,
        //     'sequencias' => $sequencias,
        //     'numeros' => $numeros,
        //     'campos' => ['concursos','sequencias','datas'],
        //     'submit' => 'loto',
        //     'filtros' => $filtros,
        //     'nomeFiltro' => 'inputLoto',
        // ];

        // return Inertia::render('Lotofacil/Lotofacil',$toView);
    }
    public function atualizarBase(LotoRequest $request)
    {

        $atualizador = new LotoService();
        if ($request->get('modo') == 'api') {
            $update_retorno = $atualizador->carregarDBViaApi();
        }
        if ($request->get('modo') == 'csv') {
            $update_retorno = $atualizador->carregarDBViaCSV();
        }
        return redirect()->route('loto')
            ->with($update_retorno['status'], $update_retorno['mensagem']);
    }

    public function cargateste(){


        $jogo = new Jogo(['numero_id'=>280]);
        $jogo->save();
        echo '<br> Jogo criado com sucesso!';


    }
}
