<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = ['numero_id'];
    public $timestamps = false;

    public function numeros()
    {
        return $this->belongsTo(Numero::class);
    }
}
