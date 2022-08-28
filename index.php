<?php

ini_set('date.timezone', 'America/Sao_Paulo');

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
        LoginController::index();
        break;
    case 'Inscricao':
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
            header("Location: $base_url?r=Login&redirect=coleta");
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
        PontoController::buscar($_GET['idPonto']);
        break;
    case 'atualizarPonto':
        PontoController::update($_POST, $_GET['idPonto']);
        break;
}
