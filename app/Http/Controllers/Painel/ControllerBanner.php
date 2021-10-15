<?php

namespace App\Http\Controllers\Painel;

use App\Models\Banner;
use App\Models\Form;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic;

class ControllerBanner extends Controller
{
    public function create(Request $request)
    {
        $this->inactivateDate();
        return view('painel.banner.frmCadBanner');
    }

    public function store(Request $request)
    {
        $objBanner = new Banner();

        try {
            if($request->image_file){
                $image_parts = explode(";base64,", $request->image_file);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                //Se não existir cria o diretorio
                $localStorage = 'banner';
                $namePhoto = 'photo_' . time() . '.' . $image_type;
                try {
                    mkdir(pathSaveImages() . $localStorage, 0777, true);
                } catch (Exception $e) {

                }
                $img = ImageManagerStatic::make($image_base64);
                $img->save(pathSaveImages()  . $localStorage. '/\/' . $namePhoto,100);

                $request->image_file= $localStorage . "/" . $namePhoto;

                $request->image_file= $localStorage . "/" . $namePhoto;
                $imgWebp = converterImagemWebp(pathSaveImages()  . $localStorage. '/\/' . $namePhoto, 80);
                delFile(pathSaveImages()  . $localStorage. '/\/' . $namePhoto);

                $pathImg = explode('img/\/', $imgWebp);
                $request->image_file = $pathImg[1];
            }

            $objBanner->title = $request->title;
            $objBanner->url = $request->url;
            $objBanner->target_page = $request->target_page;
            $objBanner->status = $request->status;
            $objBanner->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
            $objBanner->end_date = $request->end_date;
            $objBanner->imagem = $request->image_file;
            $objBanner->save();

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'Banner',  $objBanner->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-banner',
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
    $banners = Banner::all();

    $bannersList = array();
    for($i = 0; $i < count($banners); $i++){
        $bannersList[$i]['ID'] = $banners[$i]->id;
        $bannersList[$i]['TÍTULO'] = $banners[$i]->title;
        $bannersList[$i]['IMAGEM'] = '<img src="'.session('URL_IMG'). $banners[$i]->imagem.'" style="width: 100px; overflow: hidden;" >' ;
        $bannersList[$i]['INÍCIO EXIBIÇÃO'] = date_format(new DateTime($banners[$i]->begin_date), 'd/m/Y H:i:s');
        $bannersList[$i]['FIM EXIBIÇÃO'] = ($banners[$i]->end_date ? date_format(new DateTime($banners[$i]->end_date), 'd/m/Y H:i:s') : '');
        $bannersList[$i]['STATUS'] = $banners[$i]->status;
    }

    if(count($bannersList) == 0){
        $bannersList[0]['ID'] = 0;
        $bannersList[0]['TÍTULO'] = 0;
        $bannersList[0]['IMAGEM'] = 0;
        $bannersList[0]['INÍCIO EXIBIÇÃO'] = 0;
        $bannersList[0]['FIM EXIBIÇÃO'] = 0;
        $bannersList[0]['STATUS'] = 0;
        }
    return view('painel.banner.frmListaBanner', compact('bannersList'));
 }

 function status(Request $request){
    $user = Banner::find($request->id);

    if($user->status == 1){
        $user->status = 0;
    }else{
        $user->status = 1;
    }
    $user->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Banner',  $user->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $banner = Banner::find($request->id);
    delFile(pathSaveImages()  . $banner->imagem);
    $banner->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'Banner',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function find(Request $request){
    $banner = Banner::find($request->id);

     return view('painel.banner.frmAltBanner', compact('banner'));
  }

  function edit(Request $request){

    try {
        if($request->image_file){
            $image_parts = explode(";base64,", $request->image_file);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            //Se não existir cria o diretorio
            $localStorage = 'banner';
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

        $objBanner = Banner::find($request->id);
        $objBanner->title = $request->title;
        $objBanner->url = $request->url;
        $objBanner->target_page = $request->target_page;
        $objBanner->status = $request->status;
        $objBanner->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
        $objBanner->end_date = $request->end_date;
        $objBanner->imagem = ($request->image_file ? $request->image_file : $request->imgOld);
        $objBanner->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Banner',  $request->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-banner',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-banner',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

 static function inactivateDate()
 {
    Banner::where('status', 1)
    ->where('end_date', '<=', Carbon::now()->toDateString())
    ->update(['status' => 0]);
 }

}
