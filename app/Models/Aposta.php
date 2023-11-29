<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Aposta extends Model
{
    use HasFactory;
    protected $fillable = ['jogo_id', 'concurso_id'];

    public function jogo()
    {
        return $this->belongsTo(Jogo::class,'jogo_id');
    }

    public function concurso()
    {
        return $this->belongsTo(Concurso::class,'concurso_id');
    }

    public function conferir(array $numeros = [], array $concursos = [])
    {
        $resultado = [];
        if (!empty($numeros)) {
            foreach ($numeros as $num) {

                // Se for do tipo NUMEROS
                if(get_class($num) === 'App\Models\Numero'){
                    $numArray = explode(',', $num->numeros);
                    $nomeQualificado = '(T'.date('ymdHms').mt_rand(10,99).') @'. Auth::user()->username;
                    $resultado[$nomeQualificado]['seq'] = $num->sequencia;

                }

                // Se for do tipo JOGO
                if(get_class($num) === 'App\Models\Jogo'){
                    $numArray = explode(',', $num->numero->numeros);
                    $nomeQualificado = "({$num->id}) @{$num->nome}";
                    $resultado[$nomeQualificado]['seq'] = $num->numero->sequencia;

                }
                // $resultado[$nomeQualificado]['input'] = $num;
                $resultado[$nomeQualificado]['output'] = [];
                $resultado[$nomeQualificado]['nums'] = implode(',',$numArray);
                $resultado[$nomeQualificado]['stats'] = array_fill(5,11,0);


                foreach ($concursos as $cc) {
                    // var_dump($cc);
                    $ccArray = explode(',', $cc['numeros']);
                    $cc['pontuacao'] = count(array_intersect($numArray, $ccArray));
                    $resultado[$nomeQualificado]['stats'][$cc['pontuacao']]++;
                    array_push($resultado[$nomeQualificado]['output'], $cc);
                }
                // var_dump($resultado[$nomeQualificado]);
            }
            return $resultado;
        }

        // Verificação da Aposta Unica
        $numArray = explode(',',$this->jogo->numero->numeros);
        $ccArray = explode(',',$this->concurso->resultado->numero->numeros);

        return count(array_intersect($numArray,$ccArray));
    }
}
