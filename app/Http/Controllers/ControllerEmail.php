<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class ControllerEmail extends Controller
{
    function index(Request $request){

        $user = new stdClass();
        $user->name = 'Daniel Albernaz';
        $user->email = 'danielgomesalbernaz@gmail.com';

        Mail::send(new \App\Mail\newLaravelTips($user));
    }
}
