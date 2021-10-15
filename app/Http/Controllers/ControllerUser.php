<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic;

class ControllerUser extends Controller
{
    public function create(Request $request)
    {
        return view('painel.usuario.frmCadUsuario');
    }

    /**
     * Function que salva cria o User
     */
    public function store(Request $request)
    {
        $objForm = new Form();
        $objUser = new User();



        try {
            if($request->image_file){
                $image_parts = explode(";base64,", $request->image_file);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);

                //Se não existir cria o diretorio
                $localStorage = 'usuarios';
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
                $objUser->imagem = $request->image_file;
            }

            $objUser->name = $request->name;
            $objUser->email = $request->email;
            $objUser->password = Hash::make($request->password);
            $objUser->nivel_acesso = $request->nivel_acesso;
            $objUser->status = 1;
            $objUser->save();

            // print_rpre($request->all());
            // print_rpre($objUser);exit;

            /**Log */
            createLog(auth()->user()->id, 'Adicionar', 'Usuário',  $objUser->id, $_SERVER['REMOTE_ADDR']);

            $retorno = [
                'situacao' => 'success',
                'form' => 'cad',
                'redirect' => 'sistema/listar-usuario',
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
    $users = User::all();

    $usersList = array();
    for($i = 0; $i < count($users); $i++){
        $usersList[$i]['ID'] = $users[$i]->id;
        $usersList[$i]['NAME'] = $users[$i]->name;
        $usersList[$i]['IMAGEM'] = ( $users[$i]->imagem ? '<img src="'.session('URL_IMG'). $users[$i]->imagem.'" style="width: 50px; overflow: hidden;" >' : '') ;
        $usersList[$i]['EMAIL'] = $users[$i]->email;
        $usersList[$i]['DATA CADASTRO'] = date_format($users[$i]->created_at, 'd/m/Y H:i:s');
        $usersList[$i]['STATUS'] = $users[$i]->status;
    }

    if(count($usersList) == 0){
        $usersList[0]['ID'] = 0;
        $usersList[0]['NAME'] = 0;
        $usersList[0]['IMAGEM'] = 0;
        $usersList[0]['EMAIL'] = 0;
        $usersList[0]['IDATA CADASTRO'] = 0;
        $usersList[0]['STATUS'] = 0;
        }
    return view('painel.usuario.frmListaUsuario', compact('usersList'));
 }

 function status(Request $request){
    $user = User::find($request->id);

    if($user->status == 1){
        $user->status = 0;
    }else{
        $user->status = 1;
    }
    $user->save();

    /**Log */
    createLog(auth()->user()->id, 'Status', 'Usuário',  $user->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function findUser(Request $request){
   $user = User::find($request->id);

    return view('painel.usuario.frmAltUsuario', compact('user'));
 }


 function edit(Request $request){

    try {
        if($request->image_file){
            $image_parts = explode(";base64,", $request->image_file);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            //Se não existir cria o diretorio
            $localStorage = 'usuarios';
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

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->nivel_acesso = $request->nivel_acesso;
        $user->imagem = ($request->image_file ? $request->image_file : $request->imgOld);
        $user->save();

         /**Log */
        createLog(auth()->user()->id, 'Alterar', 'Usuário',  $user->id, $_SERVER['REMOTE_ADDR']);

        $retorno = [
            'situacao' => 'success',
            'form' => 'alt',
            'redirect' => 'sistema/listar-usuario',
            'msg' => 'Alteração realizada com sucesso!',
        ];
        return $retorno;

    } catch (Exception $e) {
        $retorno = [
            'situacao' => 'error',
            'form' => 'alt',
            'redirect' => 'sistema/listar-usuario',
            'msg' => 'Erro ao realizar alteração!',
        ];
        return $retorno;
    }

 }

 function delete(Request $request){
    $user = User::find($request->id);
    if($user->imagem){
        delFile(pathSaveImages()  . $user->imagem);
    }
    $user->delete();

    /**Log */
    createLog(auth()->user()->id, 'Deletar', 'Usuário',  $request->id, $_SERVER['REMOTE_ADDR']);

    $retorno = [
        'situacao' => 'success',
    ];

    return $retorno;
 }

 function logar(Request $request){
    $credentials =[
        'email' => $request->email,
        'password' => $request->password,
        'status' => 1
    ];

    if(Auth::attempt($credentials)){
        return view('painel.principal');
    }else{
        return Redirect::back()->withErrors([' Email ou senha incorretos. favor tentar novamente.']);
    }

 }

 public function logout(Request $request)
 {
     Auth::logout();
    //  return view('painel.principal');

     return redirect()->route('usuario.logout');

 }



}
