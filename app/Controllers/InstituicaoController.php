<?php

namespace FacaOBem\Controllers;

use FacaOBem\Models\Instituicao;

class InstituicaoController
{
    public static function index()
    {
        require './app/Views/consultar-instituicao.html';
    }

    public static function buscarInstituicoes($estado = '', $municipio = '')
    {

        if($estado != '' && $municipio != '')
            $data = Instituicao::buscarInstituicoesEstadoMunicipio($estado, $municipio);
        else if($estado != '' && $municipio == '')
            $data = Instituicao::buscarInstituicoesEstado($estado);
        else
            $data = Instituicao::all();

        echo json_encode($data);
    }
}
