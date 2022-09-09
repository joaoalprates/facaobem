<?php
namespace FacaOBem\Services;

use FacaOBem\Models\Instituicao;
use FacaOBem\Helpers\Session;

class InstituicaoService extends Singleton
{

    public function buscarInstituicoes($estado = '', $municipio = '')
    {
        if($estado != '' && $municipio != '')
            $data = Instituicao::buscarInstituicoesEstadoMunicipio($estado, $municipio);
        else if($estado != '' && $municipio == '')
            $data = Instituicao::buscarInstituicoesEstado($estado);
        else
            $data = Instituicao::all();

        echo json_encode($data);
    }

    public function buscarCNPJ()
    {
        echo json_encode(Instituicao::buscarCnpj((int)Session::get('idUsuario')));
    }

    public function read()
    {
        echo json_encode(Instituicao::buscarIdUsuario(Session::get('idUsuario')));
    }

}
