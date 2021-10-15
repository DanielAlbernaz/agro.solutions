<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Termo;
use Exception;
use Illuminate\Http\Request;

class ControllerTermo extends Controller
{
    function find(Request $request){
        $termo = Termo::find($request->id);
        return view('painel.termo.frmAltTermo', compact('termo'));
      }

      function edit(Request $request){
        try {

            $objTermo = Termo::find($request->id);
            $objTermo->title = $request->title;
            $objTermo->text = $request->text;
            $objTermo->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'Termo',  $objTermo->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-termo/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-termo/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }

     }
}
