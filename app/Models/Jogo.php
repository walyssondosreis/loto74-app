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
        if(!isset($attributes['user_id'])) $attributes['user_id']=Auth::id();
        if(!isset($attributes['nome']) || $attributes['nome']=='') $attributes['nome']=Auth::user()->username;
        // if($attributes['numero_id']) $attributes=['numero_id'=>Auth::id()];

        parent::__construct($attributes);
    }

    public function numero()
    {
        return $this->belongsTo(Numero::class,'numero_id');
    }
}
