<?php

namespace App\View\Components\Loto;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Formulario extends Component
{
    /**
     * Create a new component instance.
     */
    public $filtros;

    public function __construct($filtros)
    {
        $this->filtros = $filtros;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loto.formulario');
    }
}
