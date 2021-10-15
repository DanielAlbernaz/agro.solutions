<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Empresa;
use App\Models\Imovel;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ControllerAnimal extends Controller
{
    function index(Request $request)
    {

        $idAnimal = session('idAnimal');

        if(!Session::has('idAnimal')){
            return redirect()->action(['App\Http\Controllers\Site\ControllerPrincipal@index']);
        }

        $request->session()->put('pagina', 'animal');
        $request->session()->put('id', $idAnimal);

        $animal = Animal::where('status', 1)->where('id', $idAnimal)->get();
        $animaisRecentes = Animal::where('status', 1)->orderByDesc('id')->limit(3)->get();
        $empresa = Empresa::all();
        $telefones = Telefone::all();

        return view('site.paginas.animal', \compact('animal', 'empresa', 'animaisRecentes', 'telefones'));
    }
}
