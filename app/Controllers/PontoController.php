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
                echo json_encode(array('status' => true, 'msg' => 'Salvo com sucesso'));
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

    public static function buscar()
    {
        $ponto = Instituicao::buscarIdUsuario(Session::get('idUsuario'));
        echo json_encode((isset($ponto[0]) ? $ponto[0] : $ponto));
    }

    public static function update($post, $id)
    {
        $ponto = Instituicao::find((int)$id);
        $ponto->fill($post);
        $ponto->save();
        echo json_encode(array('status' => true, 'msg' => 'Editado com sucesso'));
    }
}
