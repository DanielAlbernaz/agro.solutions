<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\BannerBlog;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ControllerBannerBlog extends Controller
{
    function find(Request $request){

        $bannerBlog = BannerBlog::find($request->id);
        return view('painel.bannerBlog.frmAltBannerBlog', compact('bannerBlog'));
      }

      function edit(Request $request){
        try {
            if($request->image_file){
                $image_parts = explode(";base64,", $request->image_file);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                //Se não existir cria o diretorio
                $localStorage = 'bannerBlog';
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

                delFile(pathSaveImages()  . $request->imgOld);
            }

            $objbannerBlog = BannerBlog::find($request->id);
            $objbannerBlog->title = $request->title;
            $objbannerBlog->imagem =  ($request->image_file ? $request->image_file : $request->imgOld);
            $objbannerBlog->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'BannerBlog',  $objbannerBlog->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-bannerBlog/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-bannerBlog/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }

     }
}
