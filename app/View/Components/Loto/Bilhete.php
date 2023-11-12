<?php

namespace App\View\Components\Loto;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Bilhete extends Component
{
    /**
     * Create a new component instance.
     */
    public String $data;
    public String $nome;
    public Int $concurso;
    public String $sequencia;
    public String $numeros;

    public function __construct(
        String $data = null,
        String $nome = null,
        Int $concurso = null,
        String $sequencia,
        String $numeros
        )
    {
        $this->data = $data;
        $this->nome = $nome;
        $this->concurso = $concurso;
        $this->sequencia = $sequencia;
        $this->numeros = $numeros;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loto.bilhete');
    }
}
