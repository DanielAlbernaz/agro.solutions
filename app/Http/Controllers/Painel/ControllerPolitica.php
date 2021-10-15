<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Politica;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ControllerPolitica extends Controller
{
    function find(Request $request){
        $politica = Politica::find($request->id);
        return view('painel.politica.frmAltPolitica', compact('politica'));
      }

      function edit(Request $request){
        try {

            $objPolitica = Politica::find($request->id);
            $objPolitica->title = $request->title;
            $objPolitica->text = $request->text;
            $objPolitica->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'Politica',  $objPolitica->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-politica/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-politica/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }

     }
}
