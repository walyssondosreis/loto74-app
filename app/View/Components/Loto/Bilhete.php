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
    public function __construct(
        public $concursos
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loto.bilhete');
    }
}
