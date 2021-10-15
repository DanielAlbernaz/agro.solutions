<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\CategoriaBlog;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ControllerCategoriaBlog extends Controller
{
    public function create(Request $request)
    {
        return view('painel.categoriaBlog.frmCadCategoriaBlog');
    }

    public function store(Request $request)
    {
        $objCategoriaBlog = new CategoriaBlog();

        try {
            $objCategoriaBlog->title = $request->title;
            $objCategoriaBlog->save();

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'CategoriaBlog',  $objCategoriaBlog->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-categoriaBlog',
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
    $categoriaBlog = CategoriaBlog::all();

    $menusList = array();
    for($i = 0; $i < count($categoriaBlog); $i++){
        $categoriaList[$i]['ID'] = $categoriaBlog[$i]->id;
        $categoriaList[$i]['TÍTULO'] = $categoriaBlog[$i]->title;
        $categoriaList[$i]['DATA CADASTRO'] = date_format(new DateTime($categoriaBlog[$i]->created_at), 'd/m/Y H:i:s');
    }

    if(count($categoriaList) == 0){
        $categoriaList[0]['ID'] = 0;
        $categoriaList[0]['TÍTULO'] = 0;
        $categoriaList[0]['DATA CADASTRO'] = 0;
        }
    return view('painel.categoriaBlog.frmListaCategoriaBlog', compact('categoriaList'));
 }

 function status(Request $request){
    $categoriaBlog = CategoriaBlog::find($request->id);

    if($categoriaBlog->status == 1){
        $categoriaBlog->status = 0;
    }else{
        $categoriaBlog->status = 1;
    }
    $categoriaBlog->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Categoria Blog',  $categoriaBlog->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $categoriaBlog = CategoriaBlog::find($request->id);
    $categoriaBlog->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'CategoriaBlog',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function find(Request $request){
    $categoriaBlog = CategoriaBlog::find($request->id);

     return view('painel.categoriaBlog.frmAltCategoriaBlog', compact('categoriaBlog'));
  }

  function edit(Request $request){

    try {

        $objCategoriaBlog = CategoriaBlog::find($request->id);
        $objCategoriaBlog->title = $request->title;
        $objCategoriaBlog->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'CategoriaBlog',  $request->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaBlog',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-categoriaBlog',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

//  static function inactivateDate()
//  {
//     CategoriaBlog::where('status', 1)
//     ->where('end_date', '<=', Carbon::now()->toDateString())
//     ->update(['status' => 0]);
//  }
}
