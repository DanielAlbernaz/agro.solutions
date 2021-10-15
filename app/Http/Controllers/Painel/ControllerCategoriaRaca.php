<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\CategoriaRaca;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ControllerCategoriaRaca extends Controller
{
    public function create(Request $request)
    {
        return view('painel.categoriaRaca.frmCadCategoriaRaca');
    }

    public function store(Request $request)
    {
        $objCategoriaRaca = new CategoriaRaca();

        try {
            $objCategoriaRaca->title = $request->title;
            $objCategoriaRaca->save();

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'CategoriaRaca',  $objCategoriaRaca->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-categoriaRaca',
                'msg' => 'Cadastro salvo com sucesso!',
            ];
            return $retorno;
        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'cad',
                'msg' => 'Erro ao salvar o cadastro!',
            ];
            return $retorno;
        }
 }

 function list(Request $request){
    $categoriaRaca = CategoriaRaca::all();

    $menusList = array();
    for($i = 0; $i < count($categoriaRaca); $i++){
        $categoriaList[$i]['ID'] = $categoriaRaca[$i]->id;
        $categoriaList[$i]['TÍTULO'] = $categoriaRaca[$i]->title;
        $categoriaList[$i]['DATA CADASTRO'] = date_format(new DateTime($categoriaRaca[$i]->created_at), 'd/m/Y H:i:s');
    }

    if(count($categoriaList) == 0){
        $categoriaList[0]['ID'] = 0;
        $categoriaList[0]['TÍTULO'] = 0;
        $categoriaList[0]['DATA CADASTRO'] = 0;
        }
    return view('painel.categoriaRaca.frmListaCategoriaRaca', compact('categoriaList'));
 }

 function status(Request $request){
    $categoriaRaca = CategoriaRaca::find($request->id);

    if($categoriaRaca->status == 1){
        $categoriaRaca->status = 0;
    }else{
        $categoriaRaca->status = 1;
    }
    $categoriaRaca->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Categoria Raca',  $categoriaRaca->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $categoriaRaca = CategoriaRaca::find($request->id);
    $categoriaRaca->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'CategoriaRaca',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function find(Request $request){
    $categoriaRaca = CategoriaRaca::find($request->id);

     return view('painel.categoriaRaca.frmAltCategoriaRaca', compact('categoriaRaca'));
  }

  function edit(Request $request){

    try {

        $objCategoriaRaca = CategoriaRaca::find($request->id);
        $objCategoriaRaca->title = $request->title;
        $objCategoriaRaca->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'CategoriaRaca',  $request->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaRaca',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaRaca',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }
}
