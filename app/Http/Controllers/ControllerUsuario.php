<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Crop;
use Exception;
use Intervention\Image\ImageManagerStatic;

class ControllerUsuario extends Controller
{
    public function create(Request $request)
    {
        return view('painel/frmCadUsuario');
    }

    public function storage(Request $request)
    {
        $objForm = new Form();
        $oImg = new Crop();

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password_second = $request->password_second;
        $nivel_acesso = $request->nivel_acesso;
        $imagem = $request->imagem;
       // $objForm->print_rpre($request->all());exit;
        $x = explode('.', $request->x);
        $y = explode('.', $request->y);
        $w = explode('.', $request->w);
        $h = explode('.', $request->h);

//        $request->file('imagem')->store('usuarios');




        // $oImg->redimensiona('500', '350', '');
        // // grava nova imagem

        // $oImg->posicaoCrop( $x[0], $y[0] );
        // $oImg->redimensiona( $w[0], $h[0], 'crop' );
        // $oImg->redimensiona('500', '350', '');







        $img = ImageManagerStatic::make($imagem);


        //$img->resize($w[0]);
        //$img->resize($w[0], $h[0]);
        //$img->crop($w[0], $h[0], $x[0], $y[0]);

        // $img->resize(250, null, function($contrant){
        //     $contrant->aspectRatio();
        // });
        $img->crop($w[0], $h[0], $x[0], $y[0]);
        //$img->fit(300);
        //$img->crop(100,100,25,25);
        $local = 'usuarios';
        try {
            mkdir(storage_path('/app/public/'. $local), 0777, true);
        } catch (Exception $e) {

        }
        $img->save(storage_path('\app\public'. '/\/'  . $local) . '\imagasdeasdasms.png',50);



         //$request->file()->store('usuarios');
    //$objForm->print_rpre( storage_path('\app\public\usuarios'));exit;


        // $objForm->print_rpre($email);
        // $objForm->print_rpre($password);
        // $objForm->print_rpre($password_second);
        // $objForm->print_rpre($nivel_acesso);

        // $objForm->print_rpre($imagem);
        $objForm->print_rpre($w[0]);
        $objForm->print_rpre( $h[0]);
        $objForm->print_rpre($x[0]);
        $objForm->print_rpre($y[0]);
    }


}
