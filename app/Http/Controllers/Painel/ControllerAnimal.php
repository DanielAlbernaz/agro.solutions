<?php

namespace App\Http\Controllers\Painel;

use App\Models\Animal;
use App\Models\CategoriaAnimal;
use App\Models\CategoriaRaca;
use App\Models\Form;
use App\Models\GalleriaAnimal;
use App\Models\GalleriaProduto;
use App\Models\Produto;
use DateTime;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic;

class ControllerAnimal extends Controller
{
    public function create(Request $request)
    {
        $categoria = CategoriaAnimal::all();
        $raca = CategoriaRaca::all();

        return view('painel.animal.frmCadAnimal', compact('categoria', 'raca'));
    }

    public function store(Request $request)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $objAnimal = new Animal();
        try {
            if($request->image_file){
                $image_parts = explode(";base64,", $request->image_file);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                //Se não existir cria o diretorio
                $localStorage = 'animal';
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


            $objAnimal->codigo_animal = ($request->codigo_animal ? $request->codigo_animal : NULL );
            $objAnimal->categoria_animal = ($request->categoria_animal ? $request->categoria_animal: NULL );
            $objAnimal->finalidade_tipo = ($request->finalidade_tipo ? $request->finalidade_tipo: NULL );
            $valord = str_replace('.', '', $request->valor_unitario);
            $valor = str_replace(',', '.', $valord);
            $objAnimal->valor_unitario = ($valor ? $valor: NULL );
            $objAnimal->raca =($request->raca ? $request->raca: NULL );
            $objAnimal->data_nascimento = ($request->data_nascimento ? $request->data_nascimento: NULL );
            $objAnimal->idade = ($request->idade ? $request->idade: NULL );
            $objAnimal->peso = ($request->peso ? $request->peso: NULL );
            $objAnimal->sexo = ($request->sexo ? $request->sexo: NULL );
            $objAnimal->pelagem = ($request->pelagem ? $request->pelagem: NULL );
            $objAnimal->criacao = ($request->criacao ? $request->criacao: NULL );
            $objAnimal->tipo_animal = ($request->tipo_animal ? $request->tipo_animal: NULL );
            $objAnimal->vacinacao = ($request->vacinacao ? $request->vacinacao: NULL );
            $objAnimal->finalidade = ($request->finalidade ? $request->finalidade: NULL );
            $objAnimal->lactacao = ($request->lactacao ? $request->lactacao: NULL );
            $objAnimal->qtd = ($request->qtd ? $request->qtd: NULL );
            $objAnimal->status = ($request->status ? $request->status: NULL );
            $objAnimal->destaque = ($request->destaque ? $request->destaque: NULL );
            $objAnimal->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
            $objAnimal->end_date = ($request->end_date ? $request->end_date: NULL );
            $objAnimal->imagem = $request->image_file;
            $objAnimal->url_video = ($request->url_video ? $request->url_video: NULL );
            $objAnimal->observacoes = ($request->observacoes ? $request->observacoes: NULL );
            $objAnimal->save();

            /**Log */
            createLog(auth()->user()->id, 'Cadastro', 'Animal',  $objAnimal->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-animal',
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
    $animais = Animal::all();

    $animaisList = array();
    for($i = 0; $i < count($animais); $i++){
        $animaisList[$i]['ID'] = $animais[$i]->id;
        $animaisList[$i]['CÓDIGO ANIMAL'] = $animais[$i]->codigo_animal;
        $animaisList[$i]['IMAGEM DESTAQUE'] = '<img src="'.session('URL_IMG'). $animais[$i]->imagem.'" style="width: 100px; overflow: hidden;" >' ;
        $animaisList[$i]['INÍCIO EXIBIÇÃO'] = date_format(new DateTime($animais[$i]->begin_date), 'd/m/Y H:i:s');
        $animaisList[$i]['FIM EXIBIÇÃO'] = ($animais[$i]->end_date ? date_format(new DateTime($animais[$i]->end_date), 'd/m/Y H:i:s') : '');
        $animaisList[$i]['STATUS'] = $animais[$i]->status;
    }

    if(count($animais) == 0){
        $animaisList[0]['ID'] = 0;
        $animaisList[0]['CÓDIGO ANIMAL'] = 0;
        $animaisList[0]['IMAGEM DESTAQUE'] = 0;
        $animaisList[0]['INÍCIO EXIBIÇÃO'] = 0;
        $animaisList[0]['FIM EXIBIÇÃO'] = 0;
        $animaisList[0]['STATUS'] = 0;
        }
    return view('painel.animal.frmListaAnimal', compact('animaisList'));
 }

 function status(Request $request){
    $animal = Animal::find($request->id);

    if($animal->status == 1){
        $animal->status = 0;
    }else{
        $animal->status = 1;
    }
    $animal->save();

     /**Log */
     createLog(auth()->user()->id, 'Status', 'Animal',  $animal->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $animal = Animal::find($request->id);
    $galleriaAnimal = GalleriaAnimal::where('id_animal', $animal->id)->get();

    if(isset($galleriaAnimal[0]['id'])){
        for($i = 0; $i < count($galleriaAnimal); $i++){
            $this->destroyGalleria($galleriaAnimal[$i]['id']);
        }

    }
    delFile(pathSaveImages()  . $animal->imagem);
    $animal->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'Animal', $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function destroyGalleria($id){
    $galleriaAnimal = GalleriaAnimal::find($id);

    delFile(pathSaveImages()  . $galleriaAnimal->imagem);

    $galleriaAnimal->delete();
 }

 function find(Request $request){
    $animal = Animal::find($request->id);

    $categoria = CategoriaAnimal::all();
    $raca = CategoriaRaca::all();

    $galleriaAnimal = GalleriaAnimal::where('id_animal',  $request->id)->get();

     return view('painel.animal.frmAltAnimal', compact('animal', 'galleriaAnimal', 'categoria', 'raca' ));
  }

 function destroyImage($id){

    $galleriaAnimal = GalleriaAnimal::find($id);
    delFile(pathSaveImages()  . $galleriaAnimal->imagem);
    $galleriaAnimal->delete();

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
                $localStorage = 'animal/' . $request->id;
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

        $galleriaAnimal = new GalleriaAnimal();

        $galleriaAnimal->id_animal = $request->id;
        $galleriaAnimal->imagem = $imagem;
        $galleriaAnimal->save();
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
            $localStorage = 'animal';
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

        $objAnimal = Animal::find($request->id);
        $objAnimal->codigo_animal = ($request->codigo_animal ? $request->codigo_animal : NULL );
        $objAnimal->finalidade_tipo = ($request->finalidade_tipo ? $request->finalidade_tipo: NULL );
        $objAnimal->categoria_animal = ($request->categoria_animal ? $request->categoria_animal: NULL );
        $valord = str_replace('.', '', $request->valor_unitario);
        $valor = str_replace(',', '.', $valord);
        $objAnimal->valor_unitario = ($valor ? $valor: NULL );
        $objAnimal->raca =($request->raca ? $request->raca: NULL );
        $objAnimal->data_nascimento = ($request->data_nascimento ? $request->data_nascimento: NULL );
        $objAnimal->idade = ($request->idade ? $request->idade: NULL );
        $objAnimal->peso = ($request->peso ? $request->peso: NULL );
        $objAnimal->sexo = ($request->sexo ? $request->sexo: NULL );
        $objAnimal->pelagem = ($request->pelagem ? $request->pelagem: NULL );
        $objAnimal->criacao = ($request->criacao ? $request->criacao: NULL );
        $objAnimal->tipo_animal = ($request->tipo_animal ? $request->tipo_animal: NULL );
        $objAnimal->vacinacao = ($request->vacinacao ? $request->vacinacao: NULL );
        $objAnimal->finalidade = ($request->finalidade ? $request->finalidade: NULL );
        $objAnimal->lactacao = ($request->lactacao ? $request->lactacao: NULL );
        $objAnimal->qtd = ($request->qtd ? $request->qtd: NULL );
        $objAnimal->status = ($request->status ? $request->status: NULL );
        $objAnimal->destaque = ($request->destaque ? $request->destaque: NULL );
        $objAnimal->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
        $objAnimal->end_date = ($request->end_date ? $request->end_date: NULL );
        $objAnimal->imagem = ($request->image_file ? $request->image_file : $request->imgOld);
        $objAnimal->url_video = ($request->url_video ? $request->url_video: NULL );
        $objAnimal->observacoes = ($request->observacoes ? $request->observacoes: NULL );
        $objAnimal->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Animal', $objAnimal->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-animal',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-animal',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

 static function inactivateDate()
 {
    Animal::where('status', 1)
    ->where('end_date', '<=', Carbon::now()->toDateString())
    ->update(['status' => 0]);
 }
}
