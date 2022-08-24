<?php

use FacaOBem\Controllers\HomeController;
use FacaOBem\Controllers\InstituicaoController;

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
}
