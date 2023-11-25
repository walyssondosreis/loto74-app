<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;

use function PHPSTORM_META\type;

class Aposta extends Model
{
    use HasFactory;
    protected $fillable = ['jogo_id','concurso_id'];

    public function conferir(Array $numeros = [], Array $concursos = [] ){

        $resultado = [];

        foreach($numeros as $num){
            // var_dump($num->toArray());
            $numArray = explode(',',$num->numeros);
            $resultado[$num->numeros]=[];
            foreach($concursos as $cc){
                // var_dump($cc);
                $ccArray = explode(',',$cc['numeros']);

                $cc['pontuacao'] = count(array_intersect($numArray,$ccArray));
                array_push($resultado[$num->numeros],$cc);


            }
        }
        var_dump($resultado);
    }


}
