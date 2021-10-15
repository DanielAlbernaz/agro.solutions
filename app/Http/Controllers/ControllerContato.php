<?php

namespace App\Http\Controllers;

use App\Models\Smtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class ControllerContato extends Controller
{
    function index(Request $request){

        if (isset($_POST['g-recaptcha-response'])) {
            $captcha_data = $_POST['g-recaptcha-response'];
        }
        // Se nenhum valor foi recebido, o usu?rio n?o realizou o captcha
        if (!$captcha_data) {
            $resposta['situacao'] = "error";
            $resposta['msg'] = "<strong><i class='fa fa-exclamation-triangle'></i> ATENÇÃO!</strong><br/>Confirme o reCaptcha.";
            echo json_encode($resposta);
            exit;
        }else{
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                "secret"=>"6LeM_b0aAAAAAIDNT1jIQIjbKnkpd9Yeng4n81lh",
                "response"=>$_POST["g-recaptcha-response"],
                "remoteip"=>$_SERVER["REMOTE_ADDR"]
            )));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $reCaptcha = json_decode(curl_exec($ch),true);
            curl_close($ch);

            if($reCaptcha['success'] === true) {

                $config = Smtp::find(1);

                $emailsAEnviar = array();
                $emailsAEnviar[] = $config->email_adm;

                $msg = array();
                $msg[0]['tipo'] = 'Nome:';
                $msg[0]['msg'] = $request->nome;

                $msg[1]['tipo'] = 'E-mail:';
                $msg[1]['msg'] = $request->email;

                $msg[2]['tipo'] = 'Telefone:';
                $msg[2]['msg'] = $request->telefone;

                $msg[3]['tipo'] = 'Mensagem:';
                $msg[3]['msg'] = $request->mensagem;

                $resutl = enviaEmailContatoSite($emailsAEnviar,$msg, $config->usuario,'Formulário de contato - site.',null,'Formulário de contato - site.', $config->link_site);

                $emailContato = array();
                $emailContato[] = $request->email;

                $resultEmailContato = enviaEmailContato($emailContato,$config->usuario,'Formulário de contato');

            if(!$resutl && !$resultEmailContato){
                    $resposta['situacao'] = "error";
                    $resposta['msg'] = " Não foi possivel enviar o contato.";
                    echo json_encode($resposta);
                    exit;
                }else{
                    $resposta['situacao'] = "success";
                    echo json_encode($resposta);
                    exit;
                }


            }else{
                $resposta['situacao'] = "error";
                $resposta['msg'] = "ERRO Não foi possível validar o reCaptcha. Tente novamente";
                echo json_encode($resposta);
                exit;
            }
        }
    }
}
