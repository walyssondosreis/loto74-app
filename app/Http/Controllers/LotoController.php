<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotoRequest;
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
    public function index(LotoRequest $request)
    {
        if(!empty($request->input())){
            // var_dump('Entrou nessa casseta');
            $dadosForm = $request->input();
            unset($dadosForm['_token']);

            // Entrada de Concursos Tratamento

            if (preg_match('/[,\;]/', $dadosForm['concursos'])) {
                // echo "Contem virgula ou ponto e virgula";
                $form_concursos_tipo = 'pontual';
            } else if (preg_match('/[\s*]/', $dadosForm['concursos'])){
                $form_concursos_tipo = 'faixa';
            } else{
                $form_concursos_tipo = 'pontual';
            }

            $pattern = '/\d*/';
            if(preg_match_all($pattern,trim($dadosForm['concursos']),$matches)) {
                // var_dump($matches);
                $form_concursos = array_filter($matches[0],function($ell){
                    if($ell != '' || $ell != ',') return $ell;
                });
                sort($form_concursos);
            }
            var_dump($form_concursos_tipo);
            var_dump($form_concursos);
            

            var_dump($dadosForm);

        }
        // $a = Concurso::with('resultado.numero')->find(2808);
        // $concursos = Concurso::with('resultado.numero')->orderBy('id','desc')->simplePaginate(6);

        // Busca concursos completo na tabela com paginação
        $concursos = Concurso::with('resultado.numero')
            ->orderBy('id', 'desc')
            ->simplePaginate(3);
        // $concursos = Concurso::paginate(10);
        // var_dump($concursos[0]->resultado->numero->toArray());

        // Busca completo de concursos
        $concursos_completo = DB::table('numeros')
            ->join('resultados', 'resultados.numero_id', '=', 'numeros.id')
            ->join('concursos', 'resultados.id', '=', 'concursos.resultado_id')
            ->select(['concursos.id as cc', 'data_apuracao', 'numeros', 'sequencia'])
            ->orderBy('concursos.id', 'desc')
            ->where('concursos.id','=','2500')
            // ->where('concursos.id','<=','2599')
            ->get();

        $sequencias=[];
        $aux_1 = [];
        $numeros =[];
        $aux_2 = [];

        foreach($concursos_completo as $ccc){
            if(!in_array( $ccc->sequencia,$aux_1)){
                array_push($aux_1,$ccc->sequencia);
                $sequencias[$ccc->sequencia]['sequencia'] = $ccc->sequencia;
                $sequencias[$ccc->sequencia]['qtd'] = 1;
            }else{
                $sequencias[$ccc->sequencia]['qtd'] += 1;
            }
            foreach(explode(',',$ccc->numeros) as $n){
                if(!in_array($n,$aux_2)){
                    array_push($aux_2,$n);
                    $numeros[$n]['numero'] = $n;
                    $numeros[$n]['qtd'] = 1;
                }else{
                    $numeros[$n]['numero'] = $n;
                    $numeros[$n]['qtd'] += 1;
                }

            }

            
        }
        usort($sequencias, function ($a, $b) {
            return $b['qtd'] - $a['qtd'];
        });

        usort($numeros, function ($a, $b) {
            return $a['numero'] - $b['numero'];
        });

        // var_dump($numeros);
// var_dump($concursos_completo->toArray());exit();
        // dd($concursos_completo->toArray());
        
        // foreach($sequencias)


        // SELECT id FROM numeros WHERE  FIND_IN_SET("1", numeros); 
        // var_dump($concursos[0]->toArray());
        // dd($sequencias);
        // dd($concursos);
        $atualizador = new LotoService();
        // var_dump($atualizador->carregarDBViaCSV());exit();
        // var_dump($atualizador->carregarDBViaApi());exit();
        // var_dump($a->data_apuracao);
        // var_dump($concursos);
        // var_dump($a->resultado->toArray());
        // var_dump($a->resultado->numero->toArray());

        $toView = [
            'concursos' => $concursos,
            'sequencias' => $sequencias,
            'numeros' => $numeros,
           
        ];

        return view('loto', $toView);
    }

}
