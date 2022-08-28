<?php

namespace FacaOBem\Controllers;

use FacaOBem\Helpers\Session;
use FacaOBem\Models\Instituicao;

class PontoController
{
    public static function index()
    {
        require './app/Views/ponto.html';
    }

    public static function create($post)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $ponto = new Instituicao();
                $ponto->fill($post);
                $ponto->setAttribute('idUsuario', Session::get('idUsuario'));
                $ponto->setAttribute('situacao', 1);
                $ponto->save();
                echo json_encode(array('status' => true, 'msg' => ''));
            } catch (\Exception $e) {
                echo json_encode(array('status' => false, 'msg' => 'Erro ao salvar solicitação de ponto'));
            }
        } else {
            echo json_encode(array('status' => false, 'msg' => 'Erro ao solicitar ponto'));
        }
    }

    public static function read()
    {
        echo json_encode(Instituicao::buscarIdUsuario(Session::get('idUsuario')));
    }

    public static function delete($id)
    {
        try {
            $ponto = Instituicao::find((int)$id);
            $ponto->delete();
            echo json_encode(array('status' => true, 'msg' => ''));

        } catch (\Exception $e) {
            echo json_encode(array('status' => false, 'msg' => 'Erro ao salvar solicitação de ponto'));
        }
    }

    public static function buscar($id)
    {
        $ponto = Instituicao::find((int)$id);
        echo json_encode($ponto);
    }

    public static function update($post, $id)
    {
        $postN = [];
        $ponto = Instituicao::find((int)$id);
        $postN['descricao'] = $post['descricao-edicao'];
        $postN['data1'] = $post['data1-edicao'];
        $postN['data2'] = $post['data2-edicao'];
        $postN['turno1'] = $post['turno1-edicao'];
        $postN['turno2'] = $post['turno2-edicao'];
        $ponto->fill($postN);
        $ponto->save();
        echo json_encode(array('status' => true, 'msg' => ''));
    }
}
