<?php

namespace App\Helpers;

if(!function_exists('limparFiltros')){
    function limparFiltros($nomeFiltro, $redirect)
    {
        // var_dump($nomeFiltro);
        // var_dump($redirect);
        session()->forget($nomeFiltro);
        // return to_route('loto');
        return redirect($redirect);
        // return back();
    }
}
