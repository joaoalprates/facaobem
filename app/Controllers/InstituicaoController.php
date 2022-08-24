<?php

namespace FacaOBem\Controllers;

use FacaOBem\Models\Instituicao;

class InstituicaoController
{
    public static function index()
    {
        require './app/Views/consultar-instituicao.html';
    }

    public static function buscarInstituicoes($estado, $municipio)
    {
        $data = Instituicao::buscarInstituicoes($estado, $municipio);
        echo json_encode($data);
    }
}
