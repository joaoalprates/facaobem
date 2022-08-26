<?php

use FacaOBem\Controllers\HomeController;
use FacaOBem\Controllers\InstituicaoController;
use FacaOBem\Controllers\LoginController;
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
    case 'VerificarLogin':
        LoginController::verificarLogin($_GET['email'], $_GET['senha']);
        break;
    case 'Sair':
        LoginController::sair();
        break;
    case 'Coleta':
        if(!array_key_exists('idUsuario', Session::getAll())) {
            header("Location: $base_url?r=Login");
        }
        ColetaController::index();
        break;
}
