<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\CategoriaMarca;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ControllerCategoriaMarca extends Controller
{
    public function create(Request $request)
    {
        return view('painel.categoriaMarca.frmCadCategoriaMarca');
    }

    public function store(Request $request)
    {
        $objCategoriaRaca = new CategoriaMarca();

        try {
            $objCategoriaRaca->title = $request->title;
            $objCategoriaRaca->save();

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'CategoriaMarca',  $objCategoriaRaca->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-categoriaMarca',
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
    $categoriaMarca = CategoriaMarca::all();

    $menusList = array();
    for($i = 0; $i < count($categoriaMarca); $i++){
        $categoriaList[$i]['ID'] = $categoriaMarca[$i]->id;
        $categoriaList[$i]['TÍTULO'] = $categoriaMarca[$i]->title;
        $categoriaList[$i]['DATA CADASTRO'] = date_format(new DateTime($categoriaMarca[$i]->created_at), 'd/m/Y H:i:s');
    }

    if(count($categoriaList) == 0){
        $categoriaList[0]['ID'] = 0;
        $categoriaList[0]['TÍTULO'] = 0;
        $categoriaList[0]['DATA CADASTRO'] = 0;
        }
    return view('painel.categoriaMarca.frmListaCategoriaMarca', compact('categoriaList'));
 }

 function status(Request $request){
    $categoriaMarca = CategoriaMarca::find($request->id);

    if($categoriaMarca->status == 1){
        $categoriaMarca->status = 0;
    }else{
        $categoriaMarca->status = 1;
    }
    $categoriaMarca->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Categoria Marca',  $categoriaMarca->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $categoriaMarca = CategoriaMarca::find($request->id);
    $categoriaMarca->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'CategoriaMarca',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function find(Request $request){
    $categoriaMarca = CategoriaMarca::find($request->id);

     return view('painel.categoriaMarca.frmAltCategoriaMarca', compact('categoriaMarca'));
  }

  function edit(Request $request){

    try {

        $objCategoriaRaca = CategoriaMarca::find($request->id);
        $objCategoriaRaca->title = $request->title;
        $objCategoriaRaca->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'CategoriaMarca',  $request->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaMarca',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaMarca',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }
}
