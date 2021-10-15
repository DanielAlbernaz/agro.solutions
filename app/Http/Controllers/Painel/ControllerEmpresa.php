<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Form;
use App\Models\Telefone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic;

class ControllerEmpresa extends Controller
{
    function find(Request $request){
        $empresa = Empresa::find($request->id);
        $telefone = Telefone::all();
        return view('painel.empresa.frmAltEmpresa', compact('empresa', 'telefone'));
      }

      function edit(Request $request){
        try {

            DB::table('telefones')->truncate();

            for($i = 0; $i < count($request->telefone); $i++){
                $objTelefone = new Telefone();
                $objTelefone->telefone = $request->telefone[$i];
                $objTelefone->save();
            }

            $objempresa = Empresa::find($request->id);
            $objempresa->nome = $request->nome;
            $objempresa->whatsapp = $request->whatsapp;
            $objempresa->email = $request->email;
            $objempresa->endereco = $request->endereco;
            $objempresa->cidade = $request->cidade;
            $objempresa->instagram = $request->instagram;
            $objempresa->facebook = $request->facebook;
            $objempresa->youtube = $request->youtube;
            $objempresa->linkedIn = $request->linkedIn;
            $objempresa->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'Empresa',  $objempresa->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-empresa/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-empresa/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }

     }
}
