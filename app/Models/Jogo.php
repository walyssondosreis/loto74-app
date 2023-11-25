<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = ['numero_id','user_id','created_at','nome'];

    public function __construct(array $attributes=[])
    {
        parent::__construct($attributes);
        $this->nome =mb_strtolower(str_replace(' ','',Auth::user()->name));
    }

    public function numero()
    {
        return $this->belongsTo(Numero::class,'numero_id');
    }
}
