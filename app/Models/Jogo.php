<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;
    protected $fillable = ['concurso_id','aposta_id'];

    public function __construct(Aposta $aposta, Concurso $concurso = new Concurso())
    {
        $attributes = ['concurso_id'=>$concurso->id , 'aposta_id'=>$aposta->id];
        parent::__construct($attributes);

    }
}
