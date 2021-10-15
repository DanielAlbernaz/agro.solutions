<?php

use App\Models\Animal;
use App\Models\Blog;
use App\Models\Empresa;
use App\Models\Equipamento;
use App\Models\GalleriaAnimal;
use App\Models\GalleriaEquipamento;
use App\Models\GalleriaImovel;
use App\Models\Imovel;
use App\Models\Log;
use App\Models\Menu;
use App\Models\Smtp;
use App\Models\Telefone;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

/**
 * Classe Helpers funções de disponibilidade global
 *
 */

function print_rpre($dado)
{
        echo "<pre>";
        print_r($dado);
        echo "</pre>";
}

function pathSaveImages(){
    if($_SERVER["HTTP_HOST"] == '127.0.0.1:8000'){
        return public_path() . "\public\img/\/" ;
    }elseif($_SERVER["HTTP_HOST"] == '104.214.71.107'){
        return public_path() . "/public/img/" ;
    }else{
        //Mudar para o caminho do host atual
        return "../sevencorretores.com.br/public/img/";
    }
}

function createLog($user, $action, $form, $idData, $ip)
{
    $objLog = new Log();
    $objLog->usuario = $user;
    $objLog->acao = $action;
    $objLog->formulario = $form;
    $objLog->dado = $idData;
    $objLog->ip = $ip;
    $objLog->save();

}

function converterImagemWebp($file, $compression_quality = 80)
    {
        // check if file exists
        if (!file_exists($file)) {
            return false;
        }

        // If output file already exists return path
        $nameImg = explode('.', $file);
        $output_file = $nameImg[0] . '.webp';
        if (file_exists($output_file)) {
            return $output_file;
        }

        $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (function_exists('imagewebp')) {

            switch ($file_type) {
                case 'jpeg':
                case 'jpg':
                    $image = imagecreatefromjpeg($file);
                    break;

                case 'png':
                    $image = imagecreatefrompng($file);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;

                case 'gif':
                    $image = imagecreatefromgif($file);
                    break;
                default:
                    return false;
            }

            $result = imagewebp($image, $output_file, $compression_quality);
            if (false === $result) {
                return false;
            }

            // Free up memory
            imagedestroy($image);

            return $output_file;
        }
        elseif (class_exists('Imagick')) {
            $image = new Imagick();
            $image->readImage($file[0]);

            if ($file_type === 'png') {
                $image->setImageFormat('webp');
                $image->setImageCompressionQuality($compression_quality);
                $image->setOption('webp:lossless', 'true');
            }

            $image->writeImage($output_file);
            return $output_file;
        }

        return $output_file;
    }

    function delFile($file) {

        if (file_exists($file)) {

            $result = unlink($file);
        } else {

            $result = true;
        }

        return $result;
    }

    function urlDomain($routeStoragegalleria) {
        $url =  'http://' . $_SERVER['HTTP_HOST'] . '\/\sistema/' . $routeStoragegalleria . '/';

        return $url;
    }

function urlImg(){

    if($_SERVER["HTTP_HOST"] == '127.0.0.1:8000'){
        $urlImg = 'http://127.0.0.1:8000/public/img/';
    }else{
        if($_SERVER["HTTP_HOST"] == '104.214.71.107'){
            //alterar para o caminho do servidor
            $urlImg =  'https://' . $_SERVER['HTTP_HOST'] . '\public\img\/';
        }
        $urlImg =  'https://' . $_SERVER['HTTP_HOST'] . '/public/img/';
    }
    return $urlImg;
}

function exibirInfoEmpresa()
{
    $empresa = Empresa::find(1);

    return $empresa ;
}

function exibirTelefone()
{
    $telefones = Telefone::all();

    return $telefones;
}

function exibirMenuRodape()
{
    $menu = Menu::all();

    return $menu;
}

function formatPhone($number)
{
    $number = str_replace('(', '', $number);
    $number = str_replace(')', '', $number);
    $number = str_replace(' ', '', $number);
    $number = str_replace('-', '', $number);

    return $number;
}

function enviaEmailContatoSite($emails=null, $msg=null, $replyTo=null, $assunto=null, $anexos=null, $tituloCorpoEmail = null, $urlSite=null){
    $config = Smtp::find(1);
    // print_rpre($config);exit;
    include_once('smtp/class.phpmailer.php');

    // monta Msg
    $messg  = "";

    $aMsg = count($msg);
    for($i=0;$i<$aMsg;$i++){
        $messg .= "<b>".$msg[$i]['tipo']." </b> <span>".$msg[$i]['msg']."</span><br/>";
    }

    $content = file_get_contents(public_path('emails\adm.php'));
    $content = str_replace('{TEXTO}', $messg, $content);
    $content = str_replace('{LINKSITE}', $urlSite, $content);
    // $content = str_replace('{URLLOGO}', $configuracao['urllogo'], $content);
    $content = str_replace('{TITULOCORPOEMAIL}', $tituloCorpoEmail, $content);



    $mail  = new PHPMailer();

    $mail->IsSMTP(); // Define que a mensagem será SMTP
    // $mail->SMTPDebug  = 2;
    $mail->Host =  $config->host; // Endereço do servidor SMTP
    $mail->CharSet   = 'UTF-8';                  // enable SMTP authentication
    $mail->SMTPAuth =  $config->usuario && $config->senha ? true : false;
    if($config->usuario && $config->senha && $config->port){
        $mail->Username = $config->usuario; // Usuário do servidor SMTP
        $mail->Password = $config->senha; // Senha do servidor SMTP
        $mail->Port = $config->port;
    }

    $mail->From = $config->usuario; // Seu e-mail
    $mail->FromName =$config->nome_site; // Seu nome
    $mail->AddReplyTo($replyTo ? $replyTo : $config->usuario, $config->nome_site);

    if($anexos){
        $qtdeAnexo = count($anexos);
        for($i=0;$i<$qtdeAnexo;$i++){
            $mail->AddAttachment($anexos[$i]['url'],$anexos[$i]['name']);
        }
    }

    $mail->Subject    = $assunto;
    $mail->MsgHTML($content);
    $qtdeEmail = count($emails);
    for($i=0;$i<$qtdeEmail;$i++){
        $mail->AddAddress($emails[$i]);
    }
    $mail->IsHTML(true); // send as HTML
    $result = false;
    if ($mail->send()) {
        $result = true;
    }

    return $result;
}

function enviaEmailContato($emails=null, $replyTo=null, $assunto=null, $anexos=null){

    $config = Smtp::find(1);
    include_once('smtp/class.phpmailer.php');

    // monta Msg
    $messg  = "";

    $content = file_get_contents(public_path('emails\user.php'));
    $content = str_replace('{LINKSITE}', $config->link_site, $content);

    $mail  = new PHPMailer();

    $mail->IsSMTP(); // Define que a mensagem será SMTP
    // $mail->SMTPDebug  = 2;
    $mail->Host =  $config->host; // Endereço do servidor SMTP
    $mail->CharSet   = 'UTF-8';                  // enable SMTP authentication
    $mail->SMTPAuth =  $config->usuario && $config->senha ? true : false;
    if($config->usuario && $config->senha && $config->port){
        $mail->Username = $config->usuario; // Usuário do servidor SMTP
        $mail->Password = $config->senha; // Senha do servidor SMTP
        $mail->Port = $config->port;
    }

    $mail->From = $config->usuario; // Seu e-mail
    $mail->FromName =$config->nome_site; // Seu nome
    $mail->AddReplyTo($replyTo ? $replyTo : $config->usuario, $config->nome_site);

    if($anexos){
        $qtdeAnexo = count($anexos);
        for($i=0;$i<$qtdeAnexo;$i++){
            $mail->AddAttachment($anexos[$i]['url'],$anexos[$i]['name']);
        }
    }

    $mail->Subject    = $assunto;
    $mail->MsgHTML($content);
    $qtdeEmail = count($emails);
    for($i=0;$i<$qtdeEmail;$i++){
        $mail->AddAddress($emails[$i]);
    }
    $mail->IsHTML(true); // send as HTML
    $result = false;
    if ($mail->send()) {
        $result = true;
    }

    return $result;
}

function pathSite(){
    if($_SERVER["HTTP_HOST"] == '127.0.0.1:8000'){
        return 'http://127.0.0.1:8000/' ;

    }elseif($_SERVER["HTTP_HOST"] == '104.214.71.107'){
        return 'http://104.214.71.107/' ;
    }else{
        //Mudar para o caminho do host atual
        return "../sevencorretores.com.br/public/img/";
    }
}

function galleriaImovel($idImovel){
    $galleria = GalleriaImovel::where('id_imovel', $idImovel)->get();

    return $galleria;
}

function galleriaAnimal($idAnimal){
    $galleria = GalleriaAnimal::where('id_animal', $idAnimal)->get();

    return $galleria;
}

function galleriaEquipamento($idEquipamento){
    $galleria = GalleriaEquipamento::where('id_equipamento', $idEquipamento)->get();

    return $galleria;
}

function converteData($data) {

    if (strstr($data, "/")) {

        $A = explode("/", $data);

        $V_data = $A[2] . "-" . $A[1] . "-" . $A[0];
    } else {

        $A = explode("-", $data);

        $V_data = $A[2] . "/" . $A[1] . "/" . $A[0];
    }

    return $V_data;
}
function converteDataHora($data) {

    if (strstr($data, "/")) {
        $H = explode(' ',$data);

        $A = explode("/", $H[0]);

        $V_data = $A[2] . "-" . $A[1] . "-" . $A[0] . ' '. $H[1];
    } else {
        $H = explode(' ',$data);

        $A = explode("-", $H[0]);

        $V_data = $A[2] . "/" . $A[1] . "/" . $A[0] . ' '. $H[1];
    }

    return $V_data;
}

function metaTag($page, $id){

    if($page == 'animal'){
        $obj = Animal::find($id);
        return $obj;
    }elseif($page == 'equipamento'){
        $obj = Equipamento::find($id);
        return $obj;
    }elseif($page == 'terreno'){
        $obj = Imovel::find($id);
        return $obj;
    }elseif($page == 'blog'){
        $obj = Blog::find($id);
        return $obj;
    }

}

function urlVideoYoutube($url){

    $url = explode('v=', $url);
    $linkReal = 'https://www.youtube.com/embed/' . $url[1];

    return $linkReal;
}
