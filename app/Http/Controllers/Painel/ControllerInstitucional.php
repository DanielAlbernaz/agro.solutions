<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Institucional;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ControllerInstitucional extends Controller
{


 function find(Request $request){
    $institucional = Institucional::find($request->id);
    return view('painel.institucional.frmAltInstitucional', compact('institucional'));
  }

  function edit(Request $request){
    try {
        if($request->image_file){
            $image_parts = explode(";base64,", $request->image_file);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            //Se não existir cria o diretorio
            $localStorage = 'institucional';
            $namePhoto = 'photo_' . time() . '.' . $image_type;
            try {
                mkdir(pathSaveImages() . $localStorage, 0777, true);
            } catch (Exception $e) {

            }
            $img = ImageManagerStatic::make($image_base64);
            $img->save(pathSaveImages()  . $localStorage. '/\/' . $namePhoto,100);

            $request->image_file= $localStorage . "/" . $namePhoto;
        }

        $objInstitucional = Institucional::find($request->id);
        $objInstitucional->title = $request->title;
        $objInstitucional->sub_title = $request->sub_title;
        $objInstitucional->text = $request->text;
        $objInstitucional->status = $request->status;
        $objInstitucional->imagem =  ($request->image_file ? $request->image_file : $request->imgOld);
        $objInstitucional->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Institucional',  $objInstitucional->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/editar-institucional/1',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'editar-institucional/1',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

}
