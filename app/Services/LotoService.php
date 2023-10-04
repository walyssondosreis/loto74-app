<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Resultado;
use App\Models\Numero;
use App\Models\Concurso;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LotoService
{
    function criarCSV(): Void
    {
        $inputFilePath = storage_path('Lotofácil.xlsx');
        $outputFilePath = storage_path('lotofacil.csv');
        if (file_exists($inputFilePath)) {
            $spreadsheet = IOFactory::load($inputFilePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $csvOptions = [
                'delimiter' => ',',
                'enclosure' => '"',
            ];
            IOFactory::createWriter($spreadsheet, 'Csv')
                ->setDelimiter($csvOptions['delimiter'])
                ->setEnclosure($csvOptions['enclosure'])
                ->setLineEnding("\r\n")
                ->save($outputFilePath);

            unlink($inputFilePath);

            echo 'Arquivo CSV gerado com sucesso!' . '<br>';
        }
    }

    function getConcursoViaApi($cc = '')
    {

        $url = 'https://servicebus2.caixa.gov.br/portaldeloterias/api/lotofacil/' . $cc;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);

        curl_close($curl);

        if (curl_errno($curl)) {
            return ['erro' => 'Erro na requisição cURL: ' . curl_error($curl)];
        }

        $apiData = json_decode($response);

        if ($apiData === null) {
            return ['erro' => 'Erro ao decodificar JSON.'];
        }

        return (object)[
            'concurso' => $apiData->numero,
            'data' => $apiData->dataApuracao,
            'numeros' => implode(',', $apiData->dezenasSorteadasOrdemSorteio),
        ];
    }

    function carregarDBViaCSV()
    {
        set_time_limit(900000);
        ini_set('max_execution_time', 0);

        $this->criarCSV();

        $csvFilePath = storage_path('lotofacil.csv');

        if (!file_exists($csvFilePath)) {
            die('O arquivo CSV não foi encontrado.');
        }
        $csvFile = fopen($csvFilePath, 'r');
        $csvData = [];

        while (($row = fgetcsv($csvFile)) !== false) {
            $csvData[] = $row;
        }

        fclose($csvFile);
        array_shift($csvData);

        foreach ($csvData as $r) {

            $nums = new Numero();
            $tbl_resultados = DB::table('resultados');
            $tbl_concursos = DB::table('concursos');

            $data_apuracao = Carbon::createFromFormat('d/m/Y', $r[1]);
            $numerosInput = implode(',', array_slice($r, 2, 15));
            $ret = $nums->registrar($numerosInput);

            $buscaCCexists = ($tbl_concursos->where('id', '=', $r[0])->count());
            if ($ret['id'] != null &&  $buscaCCexists == 0) {

                // Verificar se existe alguma associação de numero x resultado já existente se sim retorna se não grava
                $rst_id = $tbl_resultados->where('numero_id', '=', $ret['id'])->exists() ? $tbl_resultados->where('numero_id', '=', $ret['id'])->first()->id : $tbl_resultados->insertGetId(['numero_id' => $ret['id']]);

                $dados_cc = [
                    'id' => $r[0],
                    'data_apuracao' => $data_apuracao->format('Y-m-d'),
                    'resultado_id' => $rst_id
                ];

                $tbl_concursos->insert($dados_cc);
            }
            echo $r[0] . ' ' . $ret['mensagem'] . '<br>';
        }
    }
    function carregarDBViaApi()
    {
        /**
         * Busca último concurso registrado do banco e na api, executa função
         * que atualiza os consursos restantes da diferença entre o que já tem cadastrado 
         * e o que falta. Lembrando se a quantidade de concursos para buscar for maior que 5
         * ele retorna a flag que indica a necessidade de carga manual do banco, pois a API não
         * suporta mais de 5 requisições simuntâneas.
         */

        // $ccs = new ConcursoModel();
        // $nums = new NumerosModel();
        // $rst = new ResultadoModel();
        
        

        $ccUltimo = new Concurso();

        
    
        $ultimoCCnoDB = $ccUltimo->max('id');

        $ultccDB = $ultimoCCnoDB ? $ultimoCCnoDB : 1;
        $ultccAPI = $this->getConcursoViaApi()->concurso;

        // Verificar gap no banco se falta CC e atualizar
        $idsCCExistem = DB::table('concursos')->pluck('id')->toArray();
        $interlavoCCTotal = range(1,$ultccDB);
        $idsCCFaltantes = array_diff($interlavoCCTotal,$idsCCExistem);

        if(!empty($idsCCFaltantes)){
            // QUEBRAR PROCESSO DE INSERSÃO DO CONCURSO NO BANCO EM OUTRA FUNÇÃO
            // TRATAR AQUI PARA INSERIR OS CC LACUNAS QUE NÃO FORAM GARREGADOS MANUALMENTE
        }
        dd($idsCCFaltantes);
        if ($ultccDB == $ultccAPI)
            return [
                'status' => 'sucesso',
                'atualizado' => true,
                'mensagem' => 'Base de dados não requer atualização',
            ];
        if (($ultccAPI - $ultccDB) > 5)
            return [
                'status' => 'aviso',
                'atualizado' => false,
                'mensagem' => 'Base de dados requer carga manual',
            ];
        for ($i = $ultccDB + 1; $i <= $ultccAPI; $i++) {
            
            $nums = new Numero();
            $tbl_resultados = DB::table('resultados');
            $tbl_concursos = DB::table('concursos');

        
            $r = $this->getConcursoViaApi($i);
            $data_apuracao = Carbon::createFromFormat('d/m/Y', $r->data);
        
            $ret = $nums->registrar($r->numeros);
            $buscaCCexists = ($tbl_concursos->where('id', '=', $r->concurso)->count());
            if ($ret['id'] != null &&  $buscaCCexists == 0) {

                $rst_id = $tbl_resultados->where('numero_id', '=', $ret['id'])->exists() ? $tbl_resultados->where('numero_id', '=', $ret['id'])->first()->id : $tbl_resultados->insertGetId(['numero_id' => $ret['id']]);
    

                $dados_cc = [
                    'id' => $r->concurso,
                    'data_apuracao' => $data_apuracao->format('Y-m-d'),
                    'resultado_id' => $rst_id,
                ];

                $tbl_concursos->insert($dados_cc);
            }
            echo $r->concurso . ' ' . $ret['mensagem'] . '<br>';
        }
        return [
            'status' => 'sucesso',
            'atualizado' => true,
            'mensagem' => 'Base de dados atualizada.',
        ];
    }
}
