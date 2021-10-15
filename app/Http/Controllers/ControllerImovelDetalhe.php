<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

class ControllerImovelDetalhe extends Controller
{
    function detalhe(Request $request)
    {
        $imovel = Imovel::find($request->id);

        $meta = array();
        $meta['og']['title'] = $imovel->titulo;
        $meta['og']['description'] = $imovel->texto;
        $meta['og']['image'] =   urlImg() . $imovel->imagem;

        return view('site.paginas.imovel', compact('imovel'));
    }
}
