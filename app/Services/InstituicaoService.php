<?php
namespace FacaOBem\Services;

use FacaOBem\Models\Instituicao;

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

}
