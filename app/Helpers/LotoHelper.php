<?php

namespace App\Helpers;

if(!function_exists('limparFiltros')){
    function limparFiltros($nomeFiltro, $redirect=null)
    {
        // var_dump($nomeFiltro);
        // var_dump($redirect);
        session()->forget($nomeFiltro);
        // return to_route('loto');
        if($redirect) return redirect($redirect);
        // return back();
    }
}
