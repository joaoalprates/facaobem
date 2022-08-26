<?php

namespace FacaOBem\Controllers;

use FacaOBem\Models\Usuario;
use FacaOBem\Helpers\Session;
use http\Header;

class LoginController
{
    public static function index()
    {
        require './app/Views/login.html';
    }

    public static function sair()
    {
        Session::destroy();
        header("Location: index.php");
    }

    public static function verificarLogin($email = '', $senha = '')
    {
        if($email == '' || $senha == ''){
            echo json_encode(array('status' => false, 'msg' => 'Preencha todos os dados'));
        } else {
            $usuario = Usuario::buscarPorEmailSenha($email, $senha);
            if(isset($usuario[0]->idUsuario)){
                Session::set('idUsuario', $usuario[0]->idUsuario);
                Session::set('nome', $usuario[0]->nome);
                Session::set('email', $usuario[0]->email);
                echo json_encode(array('status' => true, 'msg' => ''));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'E-mail ou senha incorreta'));
            }
        }
    }
}
