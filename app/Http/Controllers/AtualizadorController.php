<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LotoService;

class AtualizadorController extends Controller
{
    public function index(Request $request)
    {

        $atualizador = new LotoService();
        if ($request->get('modo') == 'api') {
            $update_retorno = $atualizador->carregarDBViaApi();
        }
        if ($request->get('modo') == 'csv') {
            $update_retorno = $atualizador->carregarDBViaCSV();
        }
        return redirect()->route('loto')
            ->with($update_retorno['status'], $update_retorno['mensagem']);
    }

}
