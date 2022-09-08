<?php

namespace FacaOBem\Controllers;

use FacaOBem\Services\InstituicaoService;

class InstituicaoController
{
    public static function index()
    {
        require './app/Views/consultar-instituicao.html';
    }

    public function buscarInstituicoes($estado = '', $municipio = '')
    {
        $iService = InstituicaoService::getInstance();
        echo $iService->buscarInstituicoes($estado, $municipio);
    }
}
