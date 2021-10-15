<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ControllerMenu extends Controller
{
    public function create(Request $request)
    {
        $this->inactivateDate();
        return view('painel.menu.frmCadMenu');
    }

    public function store(Request $request)
    {
        $objMenu = new Menu();

        try {

            $objMenu->title = $request->title;
            $objMenu->url = $request->url;
            $objMenu->target_page = $request->target_page;
            $objMenu->status = $request->status;
            $objMenu->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
            $objMenu->end_date = $request->end_date;
            $objMenu->save();

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'Menu',  $objMenu->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-menu',
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
    $menus = Menu::all();

    $menusList = array();
    for($i = 0; $i < count($menus); $i++){
        $menusList[$i]['ID'] = $menus[$i]->id;
        $menusList[$i]['TÍTULO'] = $menus[$i]->title;
        $menusList[$i]['INÍCIO EXIBIÇÃO'] = date_format(new DateTime($menus[$i]->begin_date), 'd/m/Y H:i:s');
        $menusList[$i]['FIM EXIBIÇÃO'] = ($menus[$i]->end_date ? date_format(new DateTime($menus[$i]->end_date), 'd/m/Y H:i:s') : '');
        $menusList[$i]['STATUS'] = $menus[$i]->status;
    }

    if(count($menusList) == 0){
        $menusList[0]['ID'] = 0;
        $menusList[0]['TÍTULO'] = 0;
        $menusList[0]['INÍCIO EXIBIÇÃO'] = 0;
        $menusList[0]['FIM EXIBIÇÃO'] = 0;
        $menusList[0]['STATUS'] = 0;
        }
    return view('painel.menu.frmListaMenu', compact('menusList'));
 }

 function status(Request $request){
    $menu = Menu::find($request->id);

    if($menu->status == 1){
        $menu->status = 0;
    }else{
        $menu->status = 1;
    }
    $menu->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Menu',  $menu->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $menu = Menu::find($request->id);
    unlink(storage_path('\app\public/\/'.$menu->imagem));
    $menu->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'Menu',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function find(Request $request){
    $menu = Menu::find($request->id);

     return view('painel.menu.frmAltMenu', compact('menu'));
  }

  function edit(Request $request){

    try {

        $objMenu = Menu::find($request->id);
        $objMenu->title = $request->title;
        $objMenu->url = $request->url;
        $objMenu->target_page = $request->target_page;
        $objMenu->status = $request->status;
        $objMenu->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
        $objMenu->end_date = $request->end_date;
        $objMenu->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Menu',  $request->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-menu',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-menu',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

 static function inactivateDate()
 {
    Menu::where('status', 1)
    ->where('end_date', '<=', Carbon::now()->toDateString())
    ->update(['status' => 0]);
 }
}
