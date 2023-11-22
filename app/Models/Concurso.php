<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concurso extends Model
{
    use HasFactory;

    protected $fillable = ['id','resultado_id','data_apuracao'];
    public $timestamps = false;

    public function resultado()
    {
        return $this->belongsTo(Resultado::class,'resultado_id');
    }
    public function registrar():Array
    {
        $existe = $this->where('id', $this->id)->first();

        if($existe){
            return [
                'status' => 'sucesso',
                'novo_registro' => false,
                'id' => $existe->id,
                'mensagem' => 'Registro de concurso já existe no banco de dados.',
            ];
        }
        try{
            return [
                'status' => 'sucesso',
                'novo_registro' => true,
                'id' =>$this->save(),
                'mensagem' => 'Registro de concurso foi cadastrado no banco de dados.',
            ];
        }catch(Exception $e){
            return [
                'status' => 'error',
                'novo_registro' => false,
                'id' =>null,
                'mensagem' => 'Não foi possivel registrar concurso no banco de dados.'.$e->getMessage(),
            ];
        }
    }
}
