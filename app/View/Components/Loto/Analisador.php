<?php

namespace App\View\Components\Loto;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Analisador extends Component
{
    /**
     * Create a new component instance.
     */
    public $numeros;
    public function __construct($numeros)
    {
        $this->numeros = $numeros;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loto.analisador');
    }
}
