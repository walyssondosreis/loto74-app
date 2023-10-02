<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Numero extends Model
{
    use HasFactory;
    protected $fillable = ['numeros','sequencia'];
    public $timestamps = false;

    public function aposta()
    {
        return $this->hasOne(Aposta::class);
    }

    public function resultado()
    {
        return $this->hasOne(Resultado::class);
    }

    public function ordenar(String $numerosInput): String
    {
        // Exemplo.: " 0 , 1 , 2 , 5.. ]
        $numerosVetOrdenados = explode(',', $numerosInput);
        sort($numerosVetOrdenados);
        $numerosOutput = implode(',', $numerosVetOrdenados);
        return $numerosOutput;
    }

    public function validar(String $numerosInput):Bool
    {
        $numerosInput = explode(',', $numerosInput);
        $numerosInput = array_unique($numerosInput);

        if (count($numerosInput) < 15) {
            return false;
        }

        foreach ($numerosInput as $ns) {
            $ns = trim($ns);
            if (!is_numeric($ns) || is_float($ns+0) || $ns+0 < 1 || $ns+0> 25) {
                return false;
            }
        }

        return true;
    }

    public function tratar(String $numerosInput):String
    {
        $numerosInput = explode(',', $numerosInput);
        $numerosTratados = [];
        foreach ($numerosInput as $ns) {
            array_push($numerosTratados,intval($ns));
        }
        sort($numerosTratados);
        $numerosTratados = implode(',',$numerosTratados);
        return $numerosTratados;
    }

    public function calcularSequencia(String $numerosInput):String
    {
        $numerosInput = explode(',',$numerosInput);
        $sequencia = [0, 0, 0, 0, 0];
        
        foreach ($numerosInput as $ns) {
        
            switch ($ns) {
                case $ns<= 5:
                    $sequencia[0] += 1;
                    break;
                case $ns > 5 && $ns <= 10:
                    $sequencia[1] += 1;
                    break;
                case $ns > 10 && $ns <= 15:
                    $sequencia[2] += 1;
                    break;
                case $ns > 15 && $ns <= 20:
                    $sequencia[3] += 1;
                    break;
                case $ns > 20 && $ns <= 25:
                    $sequencia[4] += 1;
                    break;
            }
        }
        $sequencia = implode(',',$sequencia);
        return $sequencia;
    }
    public function registrar(String $numerosInput)
    {
        if(!$this->validar($numerosInput))
            return[
                'status'=>'error',
                'novo_registro'=>false,
                'numero_id'=> null,
                'mensagem' => 'Entrada de números não passou na validação.',
            ];
        
        
        $existeNumeros = $this->where('numeros', $this->tratar($numerosInput))->first();

        if ($existeNumeros) {
            return [
                'status' => 'sucesso',
                'novo_registro' => false,
                'numero_id' => $existeNumeros->id,
                'mensagem' => 'Entrada de números já existe no banco de dados.',
            ];
        }
        try {
            $tbl_numeros = DB::table('numeros');
            $numero_id = $tbl_numeros->insertGetId(['numeros' => $this->tratar($numerosInput), 'sequencia' => $this->calcularSequencia($numerosInput)]);
            return [
                'status' => 'sucesso',
                'novo_registro' => true,
                'numero_id' => $numero_id,
                'mensagem' => 'Entrada de números foi cadastrada no banco de dados.',
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'novo_registro'=>false,
                'numero_id'=>null,
                'mensagem' => 'Não foi possível registrar números.'. $e->getMessage(),
            ];
        }
    }
}
