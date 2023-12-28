<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Ramsey\Uuid\Type\Integer;

use function PHPUnit\Framework\returnSelf;

class MegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultado = '1-2-3-4-5-6';
        // Cria arquivo CSV
        $jogosCru = $this->carregarJogosMega();
        $jogosValidado = [];

        // Tratar e Valida jogos
        foreach ($jogosCru as $jogo) {
            $jogo['numeros']= $this->tratarNumeros($jogo['numeros']);
            $jogo['status'] = $this->validarNumeros($jogo['numeros']);
            if ($jogo['status'] == 'jogo_valido' && $this->validarNumeros($this->tratarNumeros($resultado)) != 'jogo_invalido') {
                $jogo['pontos'] = $this->calcularPontos($jogo['numeros'], $this->tratarNumeros($resultado));
            }
            array_push($jogosValidado, $jogo);
        }

        usort($jogosValidado, function($a,$b){
            return intval($b['pontos']) - intval($a['pontos']);
        });

        $dadosView = [
            'jogosValidado' => $jogosValidado,
            'resultado' => $resultado
        ];
        // var_dump($jogosValidado);
        return view('mega', $dadosView);
    }

    public function criarCSV(): Void
    {
        $inputFilePath = storage_path('mega.xlsx');
        $outputFilePath = storage_path('mega.csv');
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

    public function carregarJogosMega(): array
    {
        set_time_limit(900000);
        ini_set('max_execution_time', 0);

        $this->criarCSV();

        $csvFilePath = storage_path('mega.csv');

        if (!file_exists($csvFilePath)) {
            die('O arquivo CSV não foi encontrado.');
        }
        $csvFile = fopen($csvFilePath, 'r');
        $csvData = [];

        while (($row = fgetcsv($csvFile)) !== false) {
            $csvData[] = $row;
        }

        fclose($csvFile);
        $indicesColuna = $csvData[0];
        array_shift($csvData);

        // dd($indicesColuna);
        $todosJogos = [];
        foreach ($csvData as $linhaCSV) {

            $jogo = [];
            foreach ($indicesColuna as $id => $nidx) {
                $jogo[$nidx] = $linhaCSV[$id];
            }
            array_push($todosJogos, $jogo);
        }

        return $todosJogos;
    }

    public function validarNumeros(String $numeros): String
    {
        $numeros = explode('-', $numeros);
        $numeros = array_unique($numeros);

        if (count($numeros) != 6) {
            return 'jogo_invalido';
        }

        foreach ($numeros as $ns) {
            $ns = trim($ns);
            if (!is_numeric($ns) || is_float($ns + 0) || $ns + 0 < 1 || $ns + 0 > 60) {
                return 'jogo_invalido';
            }
        }
        return 'jogo_valido';
    }

    public function tratarNumeros(String $numeros): String
    {
        $numeros = explode('-', $numeros);
        $numerosTratados = [];
        foreach ($numeros as $ns) {
            array_push($numerosTratados, intval($ns));
        }
        sort($numerosTratados);
        return implode('-', $numerosTratados);
    }

    public function calcularPontos(String $numeros, String $resultado): Int
    {
        $vetNumeros = explode('-', $numeros);
        $vetResultado = explode('-', $resultado);

        $pontos = array_intersect($vetNumeros, $vetResultado);

        return count($pontos);
    }
}
