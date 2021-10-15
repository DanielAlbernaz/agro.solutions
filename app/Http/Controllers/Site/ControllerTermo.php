<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Termo;
use Illuminate\Http\Request;

class ControllerTermo extends Controller
{
    function index(){
        $termo = Termo::all();
        return view('site.paginas.termo-uso', compact('termo'));
    }
}
