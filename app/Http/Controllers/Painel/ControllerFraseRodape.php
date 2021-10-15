<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\FraseRodape;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ControllerFraseRodape extends Controller
{
    function find(Request $request){

        $fraseRodape = FraseRodape::find($request->id);
        return view('painel.fraseRodape.frmAltFraseRodape', compact('fraseRodape'));
      }

      function edit(Request $request){
        try {
            $objfraseRodape = FraseRodape::find($request->id);
            $objfraseRodape->title = $request->title;
            $objfraseRodape->second_title = $request->second_title;
            $objfraseRodape->link = $request->link;
            $objfraseRodape->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'FraseRodape',  $objfraseRodape->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-fraseRodape/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-fraseRodape/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }

     }
}
