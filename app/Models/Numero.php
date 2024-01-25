<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    use HasFactory;
    protected $fillable = ['numeros', 'sequencia'];
    public $timestamps = false;

    public function __construct(String $numeros = null)
    {
        parent::__construct(['numeros' => $numeros]);
        if ($numeros) {
            $this->validar();
            $this->tratar();
            $this->calcularSequencia();
        }
    }

    public function aposta()
    {
        return $this->hasOne(Aposta::class);
    }

    public function resultado()
    {
        return $this->hasOne(Resultado::class);
    }

    public function ordenar(): Void
    {
        $numerosVetOrdenados = explode(',', $this->numeros);
        sort($numerosVetOrdenados);
        $this->numeros = implode(',', $numerosVetOrdenados);
    }

    public function validar(): Void
    {
        $numeros = explode(',', $this->numeros);
        $numeros = array_unique($numeros);

        if (count($numeros) < 15) {
            throw new \InvalidArgumentException('Entrada de numeros não passou na validação. Quantidade de números inferior ao mínimo necessário (15).');
        }

        foreach ($numeros as $ns) {
            $ns = trim($ns);
            if (!is_numeric($ns) || is_float($ns + 0) || $ns + 0 < 1 || $ns + 0 > 25) {
                throw new \InvalidArgumentException('Entrada de numeros não passou na validação. Há caracteres inválidos na sequência passada.');
            }
        }
    }

    public function tratar(): Void
    {
        $numeros = explode(',', $this->numeros);
        $numerosTratados = [];
        foreach ($numeros as $ns) {
            array_push($numerosTratados, intval($ns));
        }
        sort($numerosTratados);
        $this->numeros = implode(',', $numerosTratados);
    }

    public function calcularSequencia(): Void
    {
        $numeros = explode(',', $this->numeros);
        $sequencia = [0, 0, 0, 0, 0];

        foreach ($numeros as $ns) {

            switch ($ns) {
                case $ns <= 5:
                    $sequencia[0] += 1;
                    break;
                case $ns > 5 && $ns <= 10:
                    $sequencia[1] += 1;
                    break;
                case $ns > 10 && $ns <= 15:
                    $sequencia[2] += 1;
                    break;
                case $ns > 15 && $ns <= 20:
                    $sequencia[3] += 1;
                    break;
                case $ns > 20 && $ns <= 25:
                    $sequencia[4] += 1;
                    break;
            }
        }
        $this->sequencia = implode(',', $sequencia);
    }

    public function registrar(): array
    {
        $existe = $this->where('numeros', $this->numeros)->first();
        if ($existe) {
            return [
                'status' => 'sucesso',
                'novo_registro' => false,
                'id' => $existe->id,
                'mensagem' => 'Registro de números já existe no banco de dados.',
            ];
        }
        try {
            $this->save();
            return [
                'status' => 'sucesso',
                'novo_registro' => true,
                'id' => $this->id,
                'mensagem' => 'Registro de números foi cadastrada no banco de dados.',
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'novo_registro' => false,
                'id' => null,
                'mensagem' => 'Não foi possível registrar numeros no banco de dados.' . $e->getMessage(),
            ];
        }
    }
    public function scopeFilter($query, array $filters)
    {




        $query
            ->when($filters['concursos'] ?? null, function ($query, $concursos) {

                // Entrada de Concursos Tratamento
                if (strpos($concursos, '-')) {
                    $ccn = explode('-', $concursos);
                    sort($ccn);
                    $query->whereBetween('concursos.id', $ccn);
                } else {
                    $ccn = explode(',', $concursos);
                    sort($ccn);
                    $query->whereIn('concursos.id', $ccn);
                }

                // $query->where('concursos.id', '=', $concursos);
            })
            ->when($filters['sequencias'] ?? null, function ($query, $sequencias) {

                // Entrada de Sequencias Tratamento

                $seqs = explode(',', $sequencias);
                foreach ($seqs as $ch => $seq) {
                    $seqs[$ch] = implode(',', str_split($seq));
                }

                $query->whereHas('resultado.numero', function ($query2) use ($seqs) {
                    $query2->whereIn('numeros.sequencia', $seqs);
                });
                // $concursos_completo->whereIn('numeros.sequencia', $seqs);


            })
            ->when($filters['data_ini'] ?? null, function ($query) use ($filters) {

                // Entrada de Data Inicio Tratamento

                $filters['data_fim'] = isset($filters['data_fim']) ? $filters['data_fim'] : now()->toDateString();
                $query->whereBetween('concursos.data_apuracao', [$filters['data_ini'], $filters['data_fim']]);
            })
            ->when($filters['data_fim'] ?? null, function ($query) use ($filters) {

                // Entrada de Data Fim Tratamento

                $filters['data_ini'] = isset($filters['data_ini']) ? $filters['data_ini'] : '2003-09-29';
                $query->whereBetween('concursos.data_apuracao', [$filters['data_ini'], $filters['data_fim']]);
            });
    }
}
