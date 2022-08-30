<?php

namespace FacaOBem\Controllers;

use FacaOBem\Models\Coleta;
use FacaOBem\Models\Instituicao;
use FacaOBem\Models\Usuario;
use FacaOBem\Helpers\Session;

class LoginController
{
    public static function index()
    {
        require './app/Views/login.html';
    }

    public static function inscricao()
    {
        require './app/Views/inscricao.html';
    }

    public static function edicao()
    {
        $usuario = Usuario::find((int)Session::get('idUsuario'));
        require './app/Views/inscricao-edicao.html';
    }

    public static function sair()
    {
        Session::destroy();
        header("Location: index.php");
    }

    public static function verificarLogin($email = '', $senha = '', $redirect = '')
    {
        if($email == '' || $senha == ''){
            echo json_encode(array('status' => false, 'msg' => 'Preencha todos os dados'));
        } else {
            $usuario = Usuario::buscarPorEmailSenha($email, $senha);
            if(isset($usuario[0]->idUsuario)){
                Session::set('idUsuario', $usuario[0]->idUsuario);
                Session::set('nome', $usuario[0]->nome);
                Session::set('email', $usuario[0]->email);
                echo json_encode(array('status' => true, 'msg' => '', 'redirect' => $redirect));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'E-mail ou senha incorreta'));
            }
        }
    }

    public static function create($post)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $usuario = new Usuario();
                $usuario->fill($post);
                $usuario->save();
                echo json_encode(array('status' => true, 'msg' => ''));
            } catch (\Exception $e) {
                echo json_encode(array('status' => false, 'msg' => 'Erro ao salvar cadastro'));
            }
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Erro ao salvar cadastro'));
        }
    }

    public static function delete()
    {
        try {

            Instituicao::where('idUsuario', Session::get('idUsuario'))->delete();
            Coleta::where('idUsuario', Session::get('idUsuario'))->delete();

            $usuario = Usuario::find((int)Session::get('idUsuario'));
            $usuario->delete();

            Session::destroy();
            echo json_encode(array('status' => true, 'msg' => ''));
        } catch (\Exception $e) {
            echo json_encode(array('status' => false, 'msg' => 'Erro ao excluir conta'));
        }
    }

    public static function update($post)
    {
        $usuario = Usuario::find((int)Session::get('idUsuario'));
        $usuario->fill($post);
        $usuario->save();
        echo json_encode(array('status' => true, 'msg' => ''));
    }
}
