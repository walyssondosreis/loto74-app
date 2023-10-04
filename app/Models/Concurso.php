<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concurso extends Model
{
    use HasFactory;

    protected $fillable = ['resultado_id','data_apuracao'];
    public $timestamps = false;

    public function resultado()
    {
        return $this->belongsTo(Resultado::class,'resultado_id');
    }
    public function registrar(Array $dreg):Array
    {
        $tbl = DB::table('concursos');
        if($tbl->where('id', '=', $dreg['id'])->exists()){
            $id = $tbl->where('id', '=', $dreg['id'])->first()->id;
            return [
                'status' => 'sucesso',
                'novo_registro' => false,
                'id' => $id,
                'mensagem' => 'Registro de concurso já existe no banco de dados.',
            ];
        }
        try{
            // validar os dados de concurso antes de inserir se não lançar excessão
            $id =  $tbl->insertGetId( $dreg);
            return [
                'status' => 'sucesso',
                'novo_registro' => true,
                'id' =>$id,
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
