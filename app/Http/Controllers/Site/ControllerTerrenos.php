<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Painel\ControllerBannerTerreno;
use App\Http\Controllers\Painel\ControllerBlog;
use App\Http\Controllers\Painel\ControllerImovel;
use App\Models\BannerTerreno;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ControllerTerrenos extends Controller
{
    function index(Request $request)
    {
        ControllerImovel::inactivateDate();

        $imoveis = Imovel::where('status', 1)->orderByDesc('id')->get();
        $bannerTerreno = BannerTerreno::find(1);

        return view('site.paginas.terrenos', \compact('imoveis', 'bannerTerreno'));
    }

    function busca(Request $request){
        $query = DB::table('imoveis')->where('status', 1);

        if($request->codigo){
            $query->where('codigo_imovel', $request->codigo);
        }
        if($request->finalidade){
            $query->where('finalidade', $request->finalidade);
        }
        if($request->tipo_imovel){
            $query->where('tipo_imovel', $request->tipo_imovel);
        }
        if($request->tipo_solo ){
            $query->where('tipo_solo', $request->tipo_solo);
        }
        if($request->municipio ){
            $query->where('cidade_estado', $request->municipio);
        }
        if($request->aptidao ){
            $query->where('aptidao', $request->aptidao);
        }
        if($request->negociacao ){
            $query->where('tipo_negociacao', $request->negociacao);
        }
        if($request->aguadas ){
            $query->where('aguadas', $request->aguadas);
        }

        $imoveis = $query->get();

        $bannerTerreno = BannerTerreno::find(1);

        return view('site.paginas.terrenos', compact('imoveis', 'bannerTerreno'));

    }
}
