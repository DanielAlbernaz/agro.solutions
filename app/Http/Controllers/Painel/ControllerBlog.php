<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CategoriaBlog;
use App\Models\GalleriaBlog;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Intervention\Image\ImageManagerStatic;

class ControllerBlog extends Controller
{
    public function create(Request $request)
    {
        $this->inactivateDate();
        // $categoria = CategoriaBlog::all();

        return view('painel.blog.frmCadBlog');
    }

    public function store(Request $request)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $objBlog = new Blog();
        try {
            if($request->image_file){
                $image_parts = explode(";base64,", $request->image_file);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                //Se não existir cria o diretorio
                $localStorage = 'blog';
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


            $objBlog->title = ($request->title ? $request->title : NULL );
            $objBlog->text = ($request->text ? $request->text: NULL );
            // $objBlog->categoria =($request->categoria ? $request->categoria: NULL );
            $objBlog->status = ($request->status ? $request->status: NULL );
            $objBlog->destaque = ($request->destaque ? $request->destaque: NULL );
            $objBlog->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
            $objBlog->end_date = ($request->end_date ? $request->end_date: NULL );
            $objBlog->imagem = $request->image_file;
            $objBlog->url_video = ($request->url_video ? $request->url_video: NULL );
            $objBlog->save();

            /**Log */
            createLog(auth()->user()->id, 'Cadastro', 'Blog',  $objBlog->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-blog',
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
    $blog = Blog::all();

    $blogList = array();
    for($i = 0; $i < count($blog); $i++){
        $blogList[$i]['ID'] = $blog[$i]->id;
        $blogList[$i]['TÍTULO'] = $blog[$i]->title;
        $blogList[$i]['IMAGEM DESTAQUE'] = '<img src="'.session('URL_IMG'). $blog[$i]->imagem.'" style="width: 100px; overflow: hidden;" >' ;
        $blogList[$i]['INÍCIO EXIBIÇÃO'] = date_format(new DateTime($blog[$i]->begin_date), 'd/m/Y H:i:s');
        $blogList[$i]['FIM EXIBIÇÃO'] = ($blog[$i]->end_date ? date_format(new DateTime($blog[$i]->end_date), 'd/m/Y H:i:s') : '');
        $blogList[$i]['STATUS'] = $blog[$i]->status;
    }

    if(count($blog) == 0){
        $blogList[0]['ID'] = 0;
        $blogList[0]['TÍTULO'] = 0;
        $blogList[0]['IMAGEM DESTAQUE'] = 0;
        $blogList[0]['INÍCIO EXIBIÇÃO'] = 0;
        $blogList[0]['FIM EXIBIÇÃO'] = 0;
        $blogList[0]['STATUS'] = 0;
        }
    return view('painel.blog.frmListaBlog', compact('blogList'));
 }

 function status(Request $request){
    $blog = Blog::find($request->id);

    if($blog->status == 1){
        $blog->status = 0;
    }else{
        $blog->status = 1;
    }
    $blog->save();

     /**Log */
     createLog(auth()->user()->id, 'Status', 'Blog',  $blog->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function delete(Request $request){
    $blog = Blog::find($request->id);
    $galleriaBlog = GalleriaBlog::where('id_blog', $blog->id)->get();

    if(isset($galleriaBlog[0]['id'])){
        for($i = 0; $i < count($galleriaBlog); $i++){
            $this->destroyGalleria($galleriaBlog[$i]['id']);
        }

    }
    delFile(pathSaveImages()  . $blog->imagem);
    $blog->delete();

     /**Log */
     createLog(auth()->user()->id, 'Deletar', 'Blog', $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function destroyGalleria($id){
    $galleriaBlog = GalleriaBlog::find($id);

    delFile(pathSaveImages()  . $galleriaBlog->imagem);

    $galleriaBlog->delete();
 }

 function find(Request $request){
    $blog = Blog::find($request->id);

    // $categoria = CategoriaBlog::all();

    $galleriaBlog = GalleriaBlog::where('id_blog',  $request->id)->get();

     return view('painel.blog.frmAltBlog', compact('blog', 'galleriaBlog' ));
  }

 function destroyImage($id){

    $galleriaBlog = GalleriaBlog::find($id);
    delFile(pathSaveImages()  . $galleriaBlog->imagem);
    $galleriaBlog->delete();

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
                $localStorage = 'blog/' . $request->id;
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

        $galleriaBlog = new GalleriaBlog();

        $galleriaBlog->id_blog = $request->id;
        $galleriaBlog->imagem = $imagem;
        $galleriaBlog->save();
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
            $localStorage = 'blog';
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

        $objBlog = Blog::find($request->id);
        $objBlog->title = ($request->title ? $request->title : NULL );
        $objBlog->text = ($request->text ? $request->text: NULL );
        // $objBlog->categoria =($request->categoria ? $request->categoria: NULL );
        $objBlog->status = ($request->status ? $request->status: NULL );
        $objBlog->destaque = ($request->destaque ? $request->destaque: NULL );
        $objBlog->begin_date = ($request->begin_date ? $request->begin_date  : date('Y-m-d H:i:s'));
        $objBlog->end_date = ($request->end_date ? $request->end_date: NULL );
        $objBlog->imagem = ($request->image_file ? $request->image_file : $request->imgOld);
        $objBlog->url_video = ($request->url_video ? $request->url_video: NULL );
        $objBlog->save();

        /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Blog', $objBlog->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-blog',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-blog',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

 static function inactivateDate()
 {
    Blog::where('status', 1)
    ->where('end_date', '<=', Carbon::now()->toDateString())
    ->update(['status' => 0]);
 }
}
