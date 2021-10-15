<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Smtp;
use Exception;
use Illuminate\Http\Request;

class ControllerSmtp extends Controller
{
    function find(Request $request){
        $smtp = Smtp::find($request->id);
        return view('painel.smtp.frmAltSmtp', compact('smtp'));
      }

      function edit(Request $request){
        try {

            $objSmtp = Smtp::find($request->id);
            $objSmtp->host = $request->host;
            $objSmtp->usuario = $request->usuario;
            $objSmtp->senha = $request->senha;
            $objSmtp->port = $request->port;
            $objSmtp->nome_site = $request->nome_site;
            $objSmtp->email_adm = $request->email_adm;
            $objSmtp->link_site = $request->link_site;
            $objSmtp->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'Smtp',  $objSmtp->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-smtp/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-smtp/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }

     }

}
