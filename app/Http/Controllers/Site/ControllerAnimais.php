<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Painel\ControllerAnimal;
use App\Models\Animal;
use App\Models\BannerAnimal;
use App\Models\CategoriaAnimal;
use App\Models\CategoriaRaca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAnimais extends Controller
{
    function index()
    {
        ControllerAnimal::inactivateDate();

        $animais = Animal::where('status', 1)->orderByDesc('id')->get();
        $bannerAnimal = BannerAnimal::find(1);
        $categoria = CategoriaAnimal::all();
        $raca = CategoriaRaca::all();

        return view('site.paginas.animais', \compact('animais', 'bannerAnimal', 'categoria', 'raca'));
    }

    function busca(Request $request){

        $query = DB::table('animal')->where('status', 1);

        if($request->categoria){
            $query->where('categoria_animal', $request->categoria);
        }
        if($request->finalidade_tipo){
            $query->where('finalidade_tipo', $request->finalidade_tipo);
        }
        if($request->raca){
            $query->where('raca', $request->raca);
        }
        if($request->tipo_animal){
            $query->where('tipo_animal', $request->tipo_animal);
        }
        if($request->finalidade ){
            $query->where('finalidade', $request->finalidade);
        }
        if($request->vacinacao ){
            $query->where('vacinacao', $request->vacinacao);
        }
        if($request->criacao ){
            $query->where('criacao', $request->criacao);
        }
        if($request->sexo ){
            $query->where('sexo', $request->sexo);
        }
        if($request->pelagem ){
            $query->where('pelagem', $request->pelagem);
        }
        if($request->idade ){
            $query->where('idade', $request->idade);
        }
        if($request->peso ){
            $query->where('peso', $request->peso);
        }
        if($request->qtd ){
            $query->where('pelagem', $request->qtd);
        }
        if($request->lactacao ){
            $query->where('lactacao', $request->lactacao);
        }

        $animais = $query->get();

        $bannerAnimal = BannerAnimal::find(1);
        $categoria = CategoriaAnimal::all();
        $raca = CategoriaRaca::all();

        return view('site.paginas.animais', compact('animais', 'bannerAnimal', 'categoria', 'raca'));

    }

}
