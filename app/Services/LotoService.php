<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Resultado;
use App\Models\Numero;
use App\Models\Concurso;
use Carbon\Carbon;
use Exception;
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

        return [
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

        foreach ($csvData as $linhaCSV) {
            $resViaCSV = [
                'concurso'=> $linhaCSV[0],
                'data'=>$linhaCSV[1],
                'numeros'=>implode(',', array_slice($linhaCSV, 2, 15)),
            ];
            // dd($resViaCSV);

            $nums = new Numero();
            $res = new Resultado();
            $ccs = new Concurso();

            try {
                $retorno_numero = $nums->registrar($resViaCSV['numeros']);
                $retorno_resultado = $res->registrar($retorno_numero['id']);
                $retorno_concurso = $ccs->registrar([
                    'id' => $resViaCSV['concurso'],
                    'data_apuracao' => $resViaCSV['data'],
                    'resultado_id' => $retorno_resultado['id'],
                ]);
                // var_dump($retorno_concurso);
            } catch (Exception $e) {
                return [
                    'status' => 'error',
                    'atualizado' => false,
                    'mensagem' => 'Não foi possivel atualizar o banco via CSV.',
                ];
            }

        }
        return [
            'status' => 'sucesso',
            'atualizado' => true,
            'mensagem' => 'Base de dados atualizado.',
        ];
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

        $ccUltimo = new Concurso();

        $ultimoCCnoDB = $ccUltimo->max('id');

        $ultccDB = $ultimoCCnoDB ? $ultimoCCnoDB : 1;
        $ultccAPI = $this->getConcursoViaApi()['concurso'];

        $ccParaAtualizar = $ultccDB != $ultccAPI ? range($ultccDB + 1, $ultccAPI) : [];

        // Verificar gap no banco se falta CC e atualizar
        $idsCCExistem = DB::table('concursos')->pluck('id')->toArray();
        $interlavoCCTotal = range(1, $ultccDB);
        $idsCCFaltantes = array_diff($interlavoCCTotal, $idsCCExistem);

        $ccParaAtualizar = array_merge($ccParaAtualizar, $idsCCFaltantes);
        sort($ccParaAtualizar);
        // dd($ccParaAtualizar);
        if (empty($ccParaAtualizar))
            return [
                'status' => 'sucesso',
                'atualizado' => true,
                'mensagem' => 'Base de dados não requer atualização',
            ];
        if (count($ccParaAtualizar) > 5)
            return [
                'status' => 'aviso',
                'atualizado' => false,
                'mensagem' => 'Base de dados requer carga manual',
            ];

        foreach ($ccParaAtualizar as $i) {

            $nums = new Numero();
            $res = new Resultado();
            $ccs = new Concurso();

            try {
                $resViaApi = $this->getConcursoViaApi($i);
                $retorno_numero = $nums->registrar($resViaApi['numeros']);
                $retorno_resultado = $res->registrar($retorno_numero['id']);
                $retorno_concurso = $ccs->registrar([
                    'id' => $resViaApi['concurso'],
                    'data_apuracao' => $resViaApi['data'],
                    'resultado_id' => $retorno_resultado['id'],
                ]);
                var_dump($retorno_concurso);
            } catch (Exception $e) {
                return [
                    'status' => 'error',
                    'atualizado' => false,
                    'mensagem' => 'Não foi possivel atualizar o banco via API.',
                ];
            }
        }
        return [
            'status' => 'sucesso',
            'atualizado' => true,
            'mensagem' => 'Base de dados atualizado.',
        ];
    }
}
