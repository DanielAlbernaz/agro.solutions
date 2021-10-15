<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\GalleriaInstalacoes;
use App\Models\Instalacoes;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ControllerInstalacoes extends Controller
{
    function find(Request $request){
        $instalacoes = Instalacoes::find($request->id);
        $galleriaInstalacoes = GalleriaInstalacoes::all();

        return view('painel.instalacoes.frmAltInstalacoes', compact('instalacoes', 'galleriaInstalacoes'));
      }

      function edit(Request $request){
        try {

            $objempresa = Instalacoes::find($request->id);
            $objempresa->title = $request->title;
            $objempresa->text = $request->text;
            $objempresa->save();

            /**Log */
            createLog(auth()->user()->id, 'Alterar', 'Instalações',  $objempresa->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'alt',
                'redirect' => 'sistema/editar-instalacoes/1',
                'msg' => 'Alteração realizada com sucesso!',
            ];
            return $retorno;

        } catch (Exception $e) {
            $retorno = [
                'situacao' => 'error',
                'form' => 'alt',
                'redirect' => 'editar-instalacoes/1',
                'msg' => 'Erro ao realizar alteração!',
            ];
            return $retorno;
        }
     }

     function storeGalleria(Request $request){

        $files = $request->file;

        for($i = 0; $i < count($files); $i++){
            try {
                if($files[$i]){
                    $extensaoPhoto = $files[$i]->extension();
                    $img = ImageManagerStatic::make($files[$i]);

                    //Se não existir cria o diretorio
                    $localStorage = 'instalacoes/' . $request->id;
                    $namePhoto = 'photo_' . time() . rand(1, 100) .  $i . '.' . $extensaoPhoto;
                    try {
                        mkdir(storage_path('/app/public/'. $localStorage), 0777, true);
                    } catch (Exception $e) {

                    }
                    $img->save(storage_path('\app\public'. '/\/'  . $localStorage) . '/\/' . $namePhoto,100);

                    $imagem = $localStorage . "/" . $namePhoto;
                }

            }catch (Exception $e) {
            }

            $galleriaInstalacoes = new GalleriaInstalacoes();

            $galleriaInstalacoes->imagem = $imagem;
            $galleriaInstalacoes->save();
        }

        exit;
      }

      function destroyImage($id){

        $galleriaInstalacoes = GalleriaInstalacoes::find($id);
        unlink(storage_path('\app\public/\/'.$galleriaInstalacoes->imagem));
        $galleriaInstalacoes->delete();

        $retorno = [
            'situacao' => 'success',
        ];

        return $retorno;
        exit;
      }
}
