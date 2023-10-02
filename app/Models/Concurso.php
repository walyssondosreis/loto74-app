<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concurso extends Model
{
    use HasFactory;

    protected $fillable = ['resultado_id','data_apuracao'];
    public $timestamps = false;

    public function resultados()
    {
        return $this->belongsTo(Resultado::class);
    }
}
