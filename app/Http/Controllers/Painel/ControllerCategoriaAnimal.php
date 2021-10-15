<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\CategoriaAnimal;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ControllerCategoriaAnimal extends Controller
{
    public function create(Request $request)
    {
        return view('painel.categoriaAnimal.frmCadCategoriaAnimal');
    }

    public function store(Request $request)
    {
        $objCategoriaAnimal = new CategoriaAnimal();

        try {
            $objCategoriaAnimal->title = $request->title;
            $objCategoriaAnimal->save();

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'CategoriaAnimal',  $objCategoriaAnimal->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-categoriaAnimal',
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
    $categoriaAnimal = CategoriaAnimal::all();

    $menusList = array();
    for($i = 0; $i < count($categoriaAnimal); $i++){
        $categoriaList[$i]['ID'] = $categoriaAnimal[$i]->id;
        $categoriaList[$i]['TÍTULO'] = $categoriaAnimal[$i]->title;
        $categoriaList[$i]['DATA CADASTRO'] = date_format(new DateTime($categoriaAnimal[$i]->created_at), 'd/m/Y H:i:s');
    }

    if(count($categoriaList) == 0){
        $categoriaList[0]['ID'] = 0;
        $categoriaList[0]['TÍTULO'] = 0;
        $categoriaList[0]['DATA CADASTRO'] = 0;
        }
    return view('painel.categoriaAnimal.frmListaCategoriaAnimal', compact('categoriaList'));
 }

 function status(Request $request){
    $categoriaAnimal = CategoriaAnimal::find($request->id);

    if($categoriaAnimal->status == 1){
        $categoriaAnimal->status = 0;
    }else{
        $categoriaAnimal->status = 1;
    }
    $categoriaAnimal->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Categoria Animal',  $categoriaAnimal->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $categoriaAnimal = CategoriaAnimal::find($request->id);
    $categoriaAnimal->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'CategoriaAnimal',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function find(Request $request){
    $categoriaAnimal = CategoriaAnimal::find($request->id);

     return view('painel.categoriaAnimal.frmAltCategoriaAnimal', compact('categoriaAnimal'));
  }

  function edit(Request $request){

    try {

        $objCategoriaAnimal = CategoriaAnimal::find($request->id);
        $objCategoriaAnimal->title = $request->title;
        $objCategoriaAnimal->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'CategoriaAnimal',  $request->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaAnimal',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaAnimal',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

//  static function inactivateDate()
//  {
//     CategoriaAnimal::where('status', 1)
//     ->where('end_date', '<=', Carbon::now()->toDateString())
//     ->update(['status' => 0]);
//  }
}
