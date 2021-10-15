<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerProduto as ControllersControllerProduto;
use App\Http\Controllers\Painel\ControllerAnimal;
use App\Http\Controllers\Painel\ControllerBanner;
use App\Http\Controllers\Painel\ControllerBlog;
use App\Http\Controllers\Painel\ControllerEquipamento;
use App\Http\Controllers\Painel\ControllerImovel;
use App\Http\Controllers\Painel\ControllerProduto;
use App\Models\Animal;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Empresa;
use App\Models\Equipamento;
use App\Models\FraseRodape;
use App\Models\Imovel;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic;

class ControllerPrincipal extends Controller
{
    function index(Request $request)
    {
        /**
         * Inativações
         */
        ControllerBanner::inactivateDate();
        ControllerImovel::inactivateDate();
        ControllerAnimal::inactivateDate();
        ControllerEquipamento::inactivateDate();
        ControllerBlog::inactivateDate();

        $imoveisRecentes = Imovel::where('status', 1)->where('destaque', 1)->orderByDesc('id')->limit(6)->get();
        $animaisRecentes = Animal::where('status', 1)->where('destaque', 1)->orderByDesc('id')->limit(6)->get();
        $equipamentosRecentes = Equipamento::where('status', 1)->where('destaque', 1)->orderByDesc('id')->limit(6)->get();
        $blogRecentes = Blog::where('status', 1)->where('destaque', 1)->orderByDesc('id')->limit(3)->get();
        $frase = FraseRodape::all();


        $banner = Banner::where('status', 1)->get();

        $empresa = Empresa::all();

        return view('site.paginas.principal',  compact('banner', 'imoveisRecentes', 'animaisRecentes', 'equipamentosRecentes', 'blogRecentes', 'frase'));
    }
}
