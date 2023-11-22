<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aposta extends Model
{
    use HasFactory;

    protected $fillable = ['numero_id'];
    public $timestamps = false;

    public function __construct(Numero $numero)
    {
        $attributes = ['numero_id'=>$numero->id];
        $this->numero = $numero;
        parent::__construct($attributes);
    }

    public function numeros()
    {
        return $this->belongsTo(Numero::class);
    }
}
