<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Equipamento;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControllerEquipamento extends Controller
{
    function index(Request $request)
    {
        $idEquipamento = session('idEquipamento');

        if(!Session::has('idEquipamento')){
            return redirect()->action(['App\Http\Controllers\Site\ControllerPrincipal@index']);
        }

        $request->session()->put('pagina', 'equipamento');
        $request->session()->put('id', $idEquipamento);

        $equipamento = Equipamento::where('status', 1)->where('id', $idEquipamento)->get();
        $equipamentosRecentes = Equipamento::where('status', 1)->orderByDesc('id')->limit(3)->get();
        $empresa = Empresa::all();
        $telefones = Telefone::all();

        return view('site.paginas.equipamento', \compact('equipamento', 'empresa', 'equipamentosRecentes', 'telefones'));
    }
}
