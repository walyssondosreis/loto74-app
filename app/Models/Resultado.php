<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = ['numero_id'];
    public $timestamps = false;

    public function numero()
    {
        return $this->belongsTo(Numero::class,'numero_id');
    }
    public function registrar():Array
    {
        $existe = $this->where('numero_id', $this->numero_id)->first();

        if($existe){
            return [
                'status' => 'sucesso',
                'novo_registro' => false,
                'id' => $existe->id,
                'mensagem' => 'Registro de resultado já existe no banco de dados.',
            ];
        }
        try{
            $this->save();
            return [
                'status' => 'sucesso',
                'novo_registro' => true,
                'id' =>$this->id,
                'mensagem' => 'Registro de resultado foi cadastrado no banco de dados.',
            ];
        }catch(Exception $e){
            return [
                'status' => 'error',
                'novo_registro' => false,
                'id' =>null,
                'mensagem' => 'Não foi possivel registrar resultado no banco de dados.'.$e->getMessage(),
            ];
        }
    }
}
