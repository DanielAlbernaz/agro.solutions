<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Politica;
use Illuminate\Http\Request;

class ControllerPolitica extends Controller
{
    function index(){
        $politica = Politica::all();

        return view('site.paginas.politica-privacidade', compact('politica'));
    }
}
