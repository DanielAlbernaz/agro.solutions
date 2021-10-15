<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\CategoriaMarca;
use App\Models\Equipamento;
use App\Models\GalleriaEquipamento;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ControllerEquipamento extends Controller
{
    public function create(Request $request)
    {
        $this->inactivateDate();
        $categoria = CategoriaMarca::all();

        return view('painel.equipamento.frmCadEquipamento', compact('categoria'));
    }

    public function store(Request $request)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $objEquipamento = new Equipamento();
        try {
            if($request->image_file){
                $image_parts = explode(";base64,", $request->image_file);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                //Se não existir cria o diretorio
                $localStorage = 'equipamento';
                $namePhoto = 'photo_' . time() . '.' . $image_type;
                try {
                    mkdir(pathSaveImages() . $localStorage, 0777, true);
                } catch (Exception $e) {

                }

                $img =  ImageManagerStatic::make($image_base64);
                $img->save(pathSaveImages()  . $localStorage. '/\/' . $namePhoto,100);
                $request->image_file= $localStorage . "/" . $namePhoto;

                $imgWebp = converterImagemWebp(pathSaveImages()  . $localStorage. '/\/' . $namePhoto, 80);
                delFile(pathSaveImages()  . $localStorage. '/\/' . $namePhoto);

                $pathImg = explode('img/\/', $imgWebp);
                $request->image_file = $pathImg[1];
            }


            $objEquipamento->codigo_equipamento = ($request->codigo_equipamento ? $request->codigo_equipamento : NULL );
            $objEquipamento->marca = ($request->marca ? $request->marca: NULL );
            $objEquipamento->finalidade = ($request->finalidade ? $request->finalidade: NULL );
            $objEquipamento->nome = ($request->nome ? $request->nome: NULL );
            $valord = str_replace('.', '', $request->valor);
            $valor = str_replace(',', '.', $valord);
            $objEquipamento->valor = ($valor ? $valor: NULL );
            $objEquipamento->modelo =($request->modelo ? $request->modelo: NULL );
            $objEquipamento->ano_fabricacao = ($request->ano_fabricacao ? $request->ano_fabricacao: NULL );
            $objEquipamento->capacidade = ($request->capacidade ? $request->capacidade: NULL );
            $objEquipamento->tamanho = ($request->tamanho ? $request->tamanho: NULL );
            $objEquipamento->qtd_linhas = ($request->qtd_linhas ? $request->qtd_linhas: NULL );
            $objEquipamento->observacoes = ($request->observacoes ? $request->observacoes: NULL );
            $objEquipamento->status = ($request->status ? $request->status: NULL );
            $objEquipamento->destaque = ($request->destaque ? $request->destaque: NULL );
            $objEquipamento->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
            $objEquipamento->end_date = ($request->end_date ? $request->end_date: NULL );
            $objEquipamento->imagem = $request->image_file;
            $objEquipamento->url_video = ($request->url_video ? $request->url_video: NULL );
            $objEquipamento->save();

            /**Log */
            createLog(auth()->user()->id, 'Cadastro', 'Equipamento',  $objEquipamento->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-equipamento',
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
    $this->inactivateDate();
    $equipamento = Equipamento::all();

    $equipamentoList = array();
    for($i = 0; $i < count($equipamento); $i++){
        $equipamentoList[$i]['ID'] = $equipamento[$i]->id;
        $equipamentoList[$i]['CÓDIGO EQUIPAMENTO'] = $equipamento[$i]->codigo_equipamento;
        $equipamentoList[$i]['IMAGEM DESTAQUE'] = '<img src="'.session('URL_IMG'). $equipamento[$i]->imagem.'" style="width: 100px; overflow: hidden;" >' ;
        $equipamentoList[$i]['INÍCIO EXIBIÇÃO'] = date_format(new DateTime($equipamento[$i]->begin_date), 'd/m/Y H:i:s');
        $equipamentoList[$i]['FIM EXIBIÇÃO'] = ($equipamento[$i]->end_date ? date_format(new DateTime($equipamento[$i]->end_date), 'd/m/Y H:i:s') : '');
        $equipamentoList[$i]['STATUS'] = $equipamento[$i]->status;
    }

    if(count($equipamento) == 0){
        $equipamentoList[0]['ID'] = 0;
        $equipamentoList[0]['CÓDIGO EQUIPAMENTO'] = 0;
        $equipamentoList[0]['IMAGEM DESTAQUE'] = 0;
        $equipamentoList[0]['INÍCIO EXIBIÇÃO'] = 0;
        $equipamentoList[0]['FIM EXIBIÇÃO'] = 0;
        $equipamentoList[0]['STATUS'] = 0;
        }
    return view('painel.equipamento.frmListaEquipamento', compact('equipamentoList'));
 }

 function status(Request $request){
    $equipamento = Equipamento::find($request->id);

    if($equipamento->status == 1){
        $equipamento->status = 0;
    }else{
        $equipamento->status = 1;
    }
    $equipamento->save();

     /**Log */
     createLog(auth()->user()->id, 'Status', 'Equipamento',  $equipamento->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $equipamento = Equipamento::find($request->id);
    $galleriaEquipamento = GalleriaEquipamento::where('id_equipamento', $equipamento->id)->get();

    if(isset($galleriaEquipamento[0]['id'])){
        for($i = 0; $i < count($galleriaEquipamento); $i++){
            $this->destroyGalleria($galleriaEquipamento[$i]['id']);
        }

    }
    delFile(pathSaveImages()  . $equipamento->imagem);
    $equipamento->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'Equipamento', $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function destroyGalleria($id){
    $galleriaEquipamento = GalleriaEquipamento::find($id);

    delFile(pathSaveImages()  . $galleriaEquipamento->imagem);

    $galleriaEquipamento->delete();
 }

 function find(Request $request){
    $equipamento = Equipamento::find($request->id);

    $categoria = CategoriaMarca::all();

    $galleriaEquipamento = GalleriaEquipamento::where('id_equipamento',  $request->id)->get();

     return view('painel.equipamento.frmAltEquipamento', compact('equipamento', 'galleriaEquipamento', 'categoria' ));
  }

 function destroyImage($id){

    $galleriaEquipamento = GalleriaEquipamento::find($id);
    delFile(pathSaveImages()  . $galleriaEquipamento->imagem);
    $galleriaEquipamento->delete();

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
    exit;
  }

 function storeGalleria(Request $request){

    $files = $request->file;

    for($i = 0; $i < count($files); $i++){
        try {
            if($files[$i]){
                $extensaoPhoto = $files[$i]->extension();
                $img = ImageManagerStatic::make($files[$i]);

                //Se não existir cria o diretorio
                $localStorage = 'equipamento/' . $request->id;
                $namePhoto = 'photo_' . time() . rand(1, 100) .  $i . '.' . $extensaoPhoto;

                try {
                    mkdir(pathSaveImages() . $localStorage, 0777, true);
                } catch (Exception $e) {

                }
                $img->save(pathSaveImages()  . $localStorage. '/\/' . $namePhoto,100);

                $imagem = $localStorage . "/" . $namePhoto;

                $imgWebp = converterImagemWebp(pathSaveImages()  . $localStorage. '/\/' . $namePhoto, 80);
                delFile(pathSaveImages()  . $localStorage. '/\/' . $namePhoto);

                $pathImg = explode('img/\/', $imgWebp);
                $imagem = $pathImg[1];

            }

        }catch (Exception $e) {
        }

        $galleriaEquipamento = new GalleriaEquipamento();

        $galleriaEquipamento->id_equipamento = $request->id;
        $galleriaEquipamento->imagem = $imagem;
        $galleriaEquipamento->save();
    }

    exit;
  }

  function edit(Request $request){
    try {
        if($request->image_file){
            $image_parts = explode(";base64,", $request->image_file);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            //Se não existir cria o diretorio
            $localStorage = 'equipamento';
            $namePhoto = 'photo_' . time() . '.' . $image_type;
            try {
                mkdir(pathSaveImages() . $localStorage, 0777, true);
            } catch (Exception $e) {

            }
            $img = ImageManagerStatic::make($image_base64);
            $img->save(pathSaveImages()  . $localStorage. '/\/' . $namePhoto,100);

            $request->image_file= $localStorage . "/" . $namePhoto;

            $imgWebp = converterImagemWebp(pathSaveImages()  . $localStorage. '/\/' . $namePhoto, 80);
            delFile(pathSaveImages()  . $localStorage. '/\/' . $namePhoto);

            $pathImg = explode('img/\/', $imgWebp);
            $request->image_file = $pathImg[1];

            delFile(pathSaveImages()  . $request->imgOld);
        }

        $objEquipamento = Equipamento::find($request->id);
        $objEquipamento->codigo_equipamento = ($request->codigo_equipamento ? $request->codigo_equipamento : NULL );
        $objEquipamento->marca = ($request->marca ? $request->marca: NULL );
        $objEquipamento->finalidade = ($request->finalidade ? $request->finalidade: NULL );
        $objEquipamento->nome = ($request->nome ? $request->nome: NULL );
        $valord = str_replace('.', '', $request->valor);
        $valor = str_replace(',', '.', $valord);
        $objEquipamento->valor = ($valor ? $valor: NULL );
        $objEquipamento->modelo =($request->modelo ? $request->modelo: NULL );
        $objEquipamento->ano_fabricacao = ($request->ano_fabricacao ? $request->ano_fabricacao: NULL );
        $objEquipamento->capacidade = ($request->capacidade ? $request->capacidade: NULL );
        $objEquipamento->tamanho = ($request->tamanho ? $request->tamanho: NULL );
        $objEquipamento->qtd_linhas = ($request->qtd_linhas ? $request->qtd_linhas: NULL );
        $objEquipamento->observacoes = ($request->observacoes ? $request->observacoes: NULL );
        $objEquipamento->status = ($request->status ? $request->status: NULL );
        $objEquipamento->destaque = ($request->destaque ? $request->destaque: NULL );
        $objEquipamento->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
        $objEquipamento->end_date = ($request->end_date ? $request->end_date: NULL );
        $objEquipamento->imagem = ($request->image_file ? $request->image_file : $request->imgOld);
        $objEquipamento->url_video = ($request->url_video ? $request->url_video: NULL );
        $objEquipamento->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Equipamento', $objEquipamento->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-equipamento',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-equipamento',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

 static function inactivateDate()
 {
    Equipamento::where('status', 1)
    ->where('end_date', '<=', Carbon::now()->toDateString())
    ->update(['status' => 0]);
 }
}
