<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Painel\ControllerEquipamento;
use App\Models\BannerEquipamento;
use App\Models\CategoriaMarca;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerEquipamentos extends Controller
{
    function index()
    {
        ControllerEquipamento::inactivateDate();

        $equipamentos = Equipamento::where('status', 1)->orderByDesc('id')->get();
        $bannerEquipamento = BannerEquipamento::find(1);
        $categoria = CategoriaMarca::all();

        return view('site.paginas.equipamentos', \compact('equipamentos', 'bannerEquipamento', 'categoria'));
    }

    function busca(Request $request){
        $query = DB::table('equipamento')->where('status', 1);

        if($request->finalidade){
            $query->where('finalidade', $request->finalidade);
        }
        if($request->marca){
            $query->where('marca', $request->marca);
        }
        if($request->modelo){
            $query->where('modelo', $request->modelo);
        }
        if($request->nome){
            $query->where('nome', $request->nome);
        }
        if($request->capacidade ){
            $query->where('capacidade', $request->capacidade);
        }
        if($request->qtd_linhas ){
            $query->where('qtd_linhas', $request->qtd_linhas);
        }
        if($request->tamanho ){
            $query->where('tamanho', $request->tamanho);
        }

        $equipamentos = $query->get();

        $bannerEquipamento = BannerEquipamento::find(1);
        $categoria = CategoriaMarca::all();

        return view('site.paginas.equipamentos', compact('equipamentos', 'bannerEquipamento', 'categoria'));

    }
}
