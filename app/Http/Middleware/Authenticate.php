<?php

namespace App\Http\Middleware;

use App\Models\Form;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if($_SERVER["HTTP_HOST"] == '127.0.0.1:8000'){
            Session::put('URL_SISTEMA', 'http://127.0.0.1:8000/sistema/');
            Session::put('URL_IMG', 'http://127.0.0.1:8000/public/img/');
        }else{
            /** Dominio */
            if($_SERVER["HTTP_HOST"] == '104.214.71.107'){
                //mudar o o caminho do arquivo no servidor
                $url =   'http://104.214.71.107/Seven-imobiliaria/public/';
                $urlImagem =   'http://104.214.71.107/Seven-imobiliaria/public/img/\/';
            }else{
                $url =  'https://' . $_SERVER['HTTP_HOST'];
                $urlImagem =  'https://' . $_SERVER['HTTP_HOST'] . '/public/img/';
            }


            Session::put('URL_SISTEMA', $url);
            Session::put('URL_IMG', $urlImagem);
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
