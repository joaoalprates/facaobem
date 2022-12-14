<?php

ini_set('date.timezone', 'America/Sao_Paulo');

use FacaOBem\Controllers\EmailController;
use FacaOBem\Controllers\HomeController;
use FacaOBem\Controllers\InstituicaoController;
use FacaOBem\Controllers\LoginController;
use FacaOBem\Controllers\ColetaController;
use FacaOBem\Controllers\PontoController;
use FacaOBem\Helpers\Session;

require './bootstrap/autoload.php';

$base_url = 'http://localhost/facaobem/index.php';

if (!isset($_GET['r'])) {
    header("Location: $base_url?r=Home");
}

$route = $_GET['r'];

switch ($route) {
    case 'Home':
        HomeController::index();
        break;
    case 'ConsultarInstituicoes':
        InstituicaoController::index();
        break;
    case 'CarregarInstituicoes':
        InstituicaoController::buscarInstituicoes($_GET['estado'], $_GET['municipio']);
        break;
    case 'Login':
        if(array_key_exists('idUsuario', Session::getAll())) {
            header("Location: $base_url");
        }
        LoginController::index();
        break;
    case 'Inscricao':
        if(array_key_exists('idUsuario', Session::getAll())) {
            header("Location: $base_url");
        }
        LoginController::inscricao();
        break;
    case 'salvarInscricao':
        LoginController::create($_POST);
        break;
    case 'VerificarLogin':
        LoginController::verificarLogin($_GET['email'], $_GET['senha'], $_GET['redirect']);
        break;
    case 'Sair':
        LoginController::sair();
        break;
    case 'Coleta':
        if(!array_key_exists('idUsuario', Session::getAll())) {
            header("Location: $base_url?r=Login&redirect=coleta");
        }
        ColetaController::index();
        break;
    case 'salvarColeta':
        ColetaController::create($_POST);
        break;
    case 'carregarColeta':
        ColetaController::read();
        break;
    case 'excluirColeta':
        ColetaController::delete($_GET['idColeta']);
        break;
    case 'buscarColeta':
        ColetaController::buscar($_GET['idColeta']);
        break;
    case 'atualizarColeta':
        ColetaController::update($_POST, $_GET['idColeta']);
        break;
    case 'Ponto':
        if(!array_key_exists('idUsuario', Session::getAll())) {
            header("Location: $base_url?r=Login&redirect=ponto");
        }
        PontoController::index();
        break;
    case 'salvarPonto':
        PontoController::create($_POST);
        break;
    case 'carregarPonto':
        PontoController::read();
        break;
    case 'excluirPonto':
        PontoController::delete($_GET['idPonto']);
        break;
    case 'buscarPonto':
        PontoController::buscar();
        break;
    case 'atualizarPonto':
        PontoController::update($_POST, $_GET['idPonto']);
        break;
    case 'EditarPerfil':
        if(!array_key_exists('idUsuario', Session::getAll())) {
            header("Location: $base_url?r=Login");
        }
        LoginController::edicao();
        break;
    case 'SalvarPerfil':
        LoginController::update($_POST);
        break;
    case 'EncerrarConta':
        LoginController::delete();
        break;
    case 'CarregarCnpj':
        InstituicaoController::buscarCnpj();
        break;
    case 'Admin':
        if($_GET['hash'] != 'sadu8721hjklsa-=231kjnl7s8a9dsam1k23') {
            header("Location: $base_url?r=Login");
        }
        LoginController::telaAdmin();
        break;
    case 'carregarPontoGeral':
        PontoController::all();
        break;
    case 'AlterarSituacaoPonto':
        PontoController::alterarSituacaoPonto($_GET);
        break;
    case 'carregarColetaGeral':
        ColetaController::all();
        break;
    case 'AlterarSituacaoColeta':
        ColetaController::alterarSituacaoColeta($_GET);
        break;
    case 'RecuperarSenha':
        EmailController::enviarEmail($_POST['emailR']);
        break;
}
