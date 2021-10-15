<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Imovel;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerTerreno extends Controller
{
    public function index(Request $request)
    {
        $idTerreno = session('idTerreno');

        if(!Session::has('idTerreno')){
            return redirect()->action(['App\Http\Controllers\Site\ControllerPrincipal@index']);
        }

        $request->session()->put('pagina', 'terreno');
        $request->session()->put('id', $idTerreno);

        $imovel = Imovel::where('status', 1)->where('id', $idTerreno)->get();
        $imoveisRecentes = Imovel::where('status', 1)->orderByDesc('id')->limit(3)->get();
        $empresa = Empresa::all();
        $telefones = Telefone::all();

         return view('site.paginas.terreno', \compact('imovel', 'empresa', 'imoveisRecentes', 'telefones'));

    }
}
