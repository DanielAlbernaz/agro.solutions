<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BannerInstitucional;
use App\Models\Empresa;
use App\Models\Institucional;
use App\Models\Telefone;
use Illuminate\Http\Request;

class ControllerInstitucional extends Controller
{
    function index(){

        $institucional = Institucional::find(1);
        $bannerInstitucional = BannerInstitucional::find(1);
        $empresa = Empresa::find(1);
        $telefones = Telefone::all();

        return view('site.paginas.institucional', compact('institucional', 'bannerInstitucional', 'empresa', 'telefones'));
    }
}
