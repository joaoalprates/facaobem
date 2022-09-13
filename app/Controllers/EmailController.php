<?php

namespace FacaOBem\Controllers;

use FacaOBem\Models\Usuario;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController
{
    public static function enviarEmail($email)
    {

        $usuario = Usuario::buscarPorEmail($email);

        if(isset($usuario[0]) && $usuario[0] != null){
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Mailer = "smtp";

            $mail->SMTPDebug  = 1;
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.googlemail.com";
            $mail->Username   = "xxxxxxxx";
            $mail->Password   = "xxxxxxxx";

            $mail->IsHTML(true);
            $mail->AddAddress($email, utf8_decode($usuario[0]->nome));
            $mail->SetFrom("sicor@ecoplan.com.br", utf8_decode("FaçaOBem"));
            $mail->AddReplyTo("sicor@ecoplan.com.br", utf8_decode("FaçaOBem"));
            $mail->Subject = utf8_decode("Ajude Alguém - Faça o Bem - Esquecimento de senha");
            $content = utf8_decode("Sua senha é: <b>" . $usuario[0]->senha . "</b>");

            $mail->MsgHTML($content);
            if(!$mail->Send()) {
                echo json_encode(array('status' => false, 'msg' => 'Erro ao recuperar senha'));
            } else {
                echo json_encode(array('status' => true, 'msg' => 'Senha enviada ao seu e-mail'));
            }
        } else {
            echo json_encode(array('status' => false, 'msg' => 'E-mail não cadastrado'));
        }


    }
}
