<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = ['numero_id'];
    public $timestamps = false;

    public function numero()
    {
        return $this->belongsTo(Numero::class,'numero_id');
    }
}
